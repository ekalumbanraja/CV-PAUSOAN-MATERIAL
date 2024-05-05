<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Cart;
    use App\Models\Product;
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;
    use App\Models\OrderItem;


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
        
        public function update(Request $request, $id)
        {
            // Ambil data yang diperlukan dari permintaan
            $qty = (int)$request->input('qty');

            // Temukan item keranjang berdasarkan ID
            $cartItem = Cart::find($id);

            // Pastikan item keranjang ditemukan
            if (!$cartItem) {
                return redirect()->back()->with('error', 'Item keranjang tidak ditemukan.');
            }

            // Periksa apakah jumlah yang diminta valid
            if ($qty <= 0 || $qty > $cartItem->product->stok) {
                return redirect()->back()->with('error', 'Jumlah tidak valid atau stok tidak mencukupi.');
            }

            // Update jumlah item keranjang
            $cartItem->stok = $qty;
            $cartItem->save();

            return redirect()->back()->with('success', 'Keranjang belanja berhasil diperbarui.');
        }

        public function removeFromCart($id)
        {
            $cartItem = Cart::find($id);
            
            if (!$cartItem) {
                return redirect()->back()->with('error', 'Item not found in cart.');
            }
            
            $cartItem->delete();
            
            return redirect()->back()->with('success', 'Item removed from cart successfully.');
        }
        public function checkout() {
            // Mengambil data keranjang belanja pengguna yang sedang masuk
            $user = Auth::user();
            $cartItems = Cart::where('idUser', $user->id)->get();

            // return view('customer.checkout');
            return view('customer.checkout', compact('cartItems'));
        }
       public function incrementQuantity($id)
            {
                $cartItem = Cart::find($id);
                if (!$cartItem) {
                    return redirect()->back()->with('error', 'Produk tidak ditemukan.');
                }
            
                if ($cartItem->stok > 1) {
                    $cartItem->stok++;
                    $cartItem->save();
                }
                else {
                    return redirect()->back()->with('error', 'Pemesanan Tidak Boleh 0.');
                }
            return redirect()->back();

            }
            
        public function decrementQuantity($id)
            {
                $cartItem = Cart::find($id);
                if (!$cartItem) {
                    return redirect()->back()->with('error', 'Produk tidak ditemukan.');
                }
            
                if ($cartItem->stok > 1) {
                    $cartItem->stok--;
                    $cartItem->save();
                }
                else {
                    return redirect()->back()->with('error', 'Pemesanan Tidak Boleh 0.');
                }
            
                return redirect()->back();
            }

           
            public function transaction(){
                $user = Auth::user();


                $orders = Order::where('user_id', $user->id)->get();
                // $snapTokens = $orders ? $orders->snap_token : null;

                return view('Customer.transaction',compact('orders'));
            }
            public function destroy($id)
            {
                $order = Order::findOrFail($id);
                $order->delete();

                return redirect()->route('transaction')->with('success', 'Order berhasil dihapus');
            }

            public function placeorder(Request $request)
        {
            // Mendapatkan pengguna yang sedang login
            // dd($request->all());
            $user = Auth::user();

            $idBarangArray = [];
            $namaProdukArray = []; // definisikan array untuk menyimpan nama produk
            
            // Iterasi melalui request untuk mendapatkan id_barang dan nama_produk
            foreach ($request->id_barang as $index => $idBarang) {
                $idBarangArray[] = $idBarang;
                
                // Periksa apakah namaproduk ada dalam request sebelum memprosesnya
                if(isset($request->namaproduk[$index])) {
                    $namaProdukArray[] = $request->namaproduk[$index];
                }
            }
            
            // Simpan pesanan ke database
            $order = new Order();
            $order->user_id = $user->id;
            $order->recipient_name = $request->input('recipient_name');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->kodepos = $request->input('kodepos');
            $order->phone = $request->input('phone');
            $order->total_price = $request->input('total_price');
            $order->id_barang = json_encode($idBarangArray); // Simpan array ke dalam kolom JSON
            $order->namaproduk = json_encode($namaProdukArray);
            $order->catatan = $request->input('catatan');
            // $order->save(); // Simpan pesanan untuk mendapatkan ID

            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            // Parameter transaksi untuk Midtrans
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(), // Gunakan ID pesanan yang sudah disimpan
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $order->recipient_name,
                    'user_id' => $user->id,
                )
                // 'Product_details'=> array(
                //     'product_name' => $order->namaproduk,
                // )
            );

                // Dapatkan token SNAP setelah menyimpan pesanan
                $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Simpan token SNAP ke dalam pesanan yang sudah ada
            $order->snap_token = $snapToken;
            $order->save();
    
            // Hapus item keranjang
            Cart::where('idUser', $user->id)->delete();

            // Redirect atau tampilkan pesan sukses
            return redirect()->route('transaction', compact('snapToken'))->with('success', 'Order placed successfully!');
        }

        // public function callback(Request $request){
        //     $serverkey = config('midtrans.serverKey'); 
        //     $hashed= hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$serverkey);
        //     if($hashed=$request->signature_key){
        //         if($request->status=='unpaid'){
        //         $order=Order::find($request->order_id);
        //         $order->update(['status'=>'Paid']);

        //     }
        // }
        // }
        public function updateOrderStatus($orderId) {
            // Temukan pesanan berdasarkan ID
            $order = Order::find($orderId);
        
            // Periksa apakah pesanan ditemukan
            if($order) {
                // Update status pesanan menjadi "paid"
                $order->status = 'paid';
                $order->save();
        
                // Kirim respon sukses
                return response()->json(['message' => 'Order status updated successfully'], 200);
            } else {
                // Kirim respon pesanan tidak ditemukan
                return response()->json(['message' => 'Order not found'], 404);
            }
        }

    }