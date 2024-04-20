<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Cart;
    use App\Models\Product;
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;

    class Customer extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function addToCart(Request $request)
        {
            // Ambil user yang sedang login
            $user = Auth::user();
        
            // Ambil data produk dari permintaan
            $idProduct = $request->input('idProduct');
            $stokProduct = $request->input('stok');
            $totalPrice = $request->input('totalPrice');
        
            // Periksa apakah stok cukup untuk ditambahkan ke dalam keranjang
            $qty = (int)$request->input('qty');
            if ($qty <= 0 || $qty > $stokProduct) {
                return redirect()->back()->with('error', 'Jumlah tidak valid atau stok tidak mencukupi.');
            }
        
            // Temukan produk berdasarkan ID
            $product = Product::find($idProduct);
        
            // Pastikan produk ditemukan
            if (!$product) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }
        
            // Cek apakah produk sudah ada di keranjang belanja user
            $existingCartItem = Cart::where('idUser', $user->id)->where('id_barang', $idProduct)->first();
        
            if ($existingCartItem) {
                // Jika produk sudah ada di keranjang, kembalikan pesan error
                return redirect()->back()->with('error', 'Produk sudah ada di keranjang.');
            } else {
                // Jika produk belum ada di keranjang, tambahkan sebagai item baru
                $cartItem = new Cart();
                $cartItem->idUser = $user->id;
                $cartItem->id_barang = $idProduct;
                $cartItem->stok = $qty;
                $cartItem->price = $totalPrice; // Gunakan total price yang dihitung
                $cartItem->save();
            }
        
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        }
        
        public function cart()
        {
            // Ambil user yang sedang login
            $user = Auth::user();
            
            $totalPrice = 0;
            // Ambil data keranjang belanja pengguna yang sedang login
            $cartItems = Cart::where('idUser', $user->id)->get();
            
            // Tambahkan logika untuk mendapatkan gambar produk dan nama kategori dari kolom 'image' dan relasi 'category' di dalam model 'Product'
            foreach ($cartItems as $cartItem) {
                // Ambil produk berdasarkan ID barang
                $product = Product::find($cartItem->id_barang);
                
                // Jika produk ditemukan, tambahkan gambar produk dan nama kategori ke dalam objek keranjang belanja
                if ($product) {
                    $cartItem->categoryName = $product->category->category_name; // Ambil nama kategori dari relasi
                    $cartItem->productPrice = $product->price; // Harga per unit
                    $cartItem->price = $product->price * $cartItem->stok; // Total harga untuk item ini
                    $totalPrice += $cartItem->price; // Menghitung total harga
                } else {
                    // Jika produk tidak ditemukan, set gambar produk dan nama kategori menjadi null
                    $cartItem->categoryName = null;
                    $cartItem->productPrice = null;
                    $cartItem->price = null;
                }
            }
            
            
            $totalPriceIDR = number_format($totalPrice, 0, ',', '.');
            
            // Kirim data ke tampilan
            return view('customer.cart', compact('cartItems', 'totalPriceIDR', 'totalPrice'));
        }
        
        
        public function delete($id)
        {
            // Temukan item keranjang berdasarkan ID
            $cartItem = Cart::find($id);
        
            // Periksa apakah item keranjang ditemukan
            if ($cartItem) {
                // Hapus item keranjang
                $cartItem->delete();
                return redirect()->back()->with('success', 'Item keranjang berhasil dihapus.');
            } else {
                return redirect()->back()->with('error', 'Item keranjang tidak ditemukan.');
            }
        }
        public function store(Request $request)
        {
            // Validasi request sesuai kebutuhan
            $request->validate([
                'quantities' => 'required|array',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);
    
            // Buat pesanan baru
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->shipping_address = 'Alamat Pengiriman'; // sesuaikan dengan input yang sesuai
            $order->order_date = now();
            $order->save();
    
            // Simpan setiap item pesanan ke dalam database
            foreach ($request->quantities as $index => $quantity) {
                $item = $cartItems[$index]; // asumsikan $cartItems adalah variable yang berisi item keranjang belanja
                $orderItem = new OrderItem();
                $orderItem->user_id = auth()->user()->id;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->quantity = $quantity;
                $orderItem->price = $item->price;
                $orderItem->save();
            }
    
            // Lakukan proses selanjutnya seperti pengurangan stok barang, pengiriman email konfirmasi, dll.
    
            // Redirect atau kembalikan respon yang sesuai
        }

    }
