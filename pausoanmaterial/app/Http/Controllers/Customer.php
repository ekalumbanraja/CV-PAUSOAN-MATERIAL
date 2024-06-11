<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Cart;
    use App\Models\Product;
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Pengiriman;
    use App\Models\HistoryPembelian;
    use Dompdf\Dompdf;
use App\Models\transactions;

    use Dompdf\Options;

    use Illuminate\Support\Facades\Log;

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
        $totalPrice = $request->input('totalPrice');
    
        // Periksa apakah stok cukup untuk ditambahkan ke dalam keranjang
        $qty = (int)$request->input('qty');
        $product = Product::find($idProduct);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($qty <= 0 || $qty > $product->stok) {
            return redirect()->back()->with('error', 'Jumlah tidak valid atau stok tidak mencukupi.');
        }
    
        // Cek apakah produk sudah ada di keranjang belanja user
        $existingCartItem = Cart::where('idUser', $user->id)->where('id_barang', $idProduct)->first();
    
        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Produk sudah ada di keranjang.');
        } else {
            // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            $cartItem = new Cart();
            $cartItem->idUser = $user->id;
            $cartItem->id_barang = $idProduct;
            $cartItem->stok = $qty;
            $cartItem->price = $totalPrice;
            $cartItem->save();

            // Kurangi stok produk
            $product->stok -= $qty;
            $product->save();
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
            // Find the cart item by ID
            $cartItem = Cart::find($id);
        
            // Check if the cart item exists
            if (!$cartItem) {
                return redirect()->back()->with('error', 'Item not found in cart.');
            }
        
            // Find the product associated with the cart item
            $product = Product::find($cartItem->id_barang);
        
            // Check if the product exists
            if ($product) {
                // Increase the product's stock by the quantity in the cart item
                $product->stok += $cartItem->stok;
                $product->save();
            }
        
            // Remove the cart item
            $cartItem->delete();
        
            // Redirect back with a success message
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
        Log::error("Cart item not found for id: $id");
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    if ($cartItem->stok < $cartItem->product->stok) {
        $cartItem->stok++;
        $cartItem->save();
    } else {
        Log::error("Insufficient stock for product id: {$cartItem->product->id}");
        return redirect()->back()->with('error', 'Stok tidak mencukupi.');
    }
    return redirect()->back();
}

public function decrementQuantity($id)
{
    $cartItem = Cart::find($id);
    if (!$cartItem) {
        Log::error("Cart item not found for id: $id");
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    if ($cartItem->stok > 1) {
        $cartItem->stok--;
        $cartItem->save();
    } else {
        Log::error("Cannot decrement quantity below 1 for cart item id: $id");
        return redirect()->back()->with('error', 'Pemesanan Tidak Boleh 0.');
    }

    return redirect()->back();
}
            public function transaction(){
                    $user = Auth::user();
                    $orders = Order::where('user_id', $user->id)->get();
                    // $orders = Order::where('user_id', $user->id);
                    return view('Customer.transaction', compact('orders'));
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
            
            // Iterasi melalui request untuk mendaxpatkan id_barang dan nama_produk
            foreach ($request->id_barang as $index => $idBarang) {
                $idBarangArray[] = $idBarang;
                
                // Periksa apakah namaproduk ada dalam request sebelum memprosesnya
                if(isset($request->namaproduk[$index])) {
                    $namaProdukArray[] = $request->namaproduk[$index];
                }
            }
            
            // Simpan pesanan ke database

            $order = new Order();
            $order->id = $request->input('order_id');
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
                    'order_id' => $order->id, 
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $order->recipient_name,
                    'user_id' => $user->id,
                )
            );

                // Dapatkan token SNAP setelah menyimpan pesanan
                $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Simpan token SNAP ke dalam pesanan yang sudah ada
            $order->snap_token = $snapToken;
            $order->save();
            // dd($request->all());  
            // Hapus item keranjang
            Cart::where('idUser', $user->id)->delete();
            // Order::where('idUser', $user->id)->delete();

            // Redirect atau tampilkan pesan sukses
            return redirect()->route('transaction', compact('snapToken'))->with('success', 'Order placed successfully!');
        }

        // public function callback(Request $request){
        //     $serverkey = config('midtrans.serverKey'); 
        //     $hashed= hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$serverkey);
        //     if($hashed==$request->signature_key){
        //         if($request->transaction_status=='capture'){
        //         $order=Order::find($request->order_id);
        //         $order->update(['status'=>'paid']);

        //     }
        // }
        // }
       public function updateStatus(Request $request, $orderId)
        {
        // Validasi request
        $request->validate([
            'status' => 'required|in:paid' // Pastikan status yang diterima adalah 'paid'
        ]);

        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($orderId);

        // Perbarui status pesanan
        $order->status = $request->status;
        $order->save();

        return response()->json(['message' => 'Status pesanan berhasil diperbarui'], 200);
        }

        // public function markAsRead($id)
        // {
        //     // Temukan notifikasi berdasarkan ID
        //     $notification = Auth::user()->notifications()->findOrFail($id);
    
        //     // Tandai notifikasi sebagai sudah dibaca
        //     $notification->markAsRead();
    
        //     // Redirect kembali ke halaman sebelumnya atau ke halaman lain yang Anda tentukan
        //     return redirect()->back()->with('success', 'Notifikasi telah ditandai sebagai sudah dibaca.');
        // }

        public function getOrder($orderId)
            {
                $order = Order::find($orderId);

                return response()->json($order);
            }
        function printReceiptPdf($orderData) {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
        
            $dompdf = new Dompdf($options);
        
            // Buat template struk dengan data pesanan yang diterima
            $receiptContent = view('struk', compact('orderData'));
        
            $dompdf->loadHtml($receiptContent);
        
            // Atur ukuran dan orientasi halaman
            $dompdf->setPaper('A4', 'portrait');
        
            // Render PDF (mengonversi view menjadi PDF)
            $dompdf->render();
        
            // Keluarkan konten PDF ke browser
            $dompdf->stream('struk_pembayaran.pdf', array('Attachment' => 0));
        }
        public function cekPengiriman($orderId)
        {
            // Ambil data pengiriman berdasarkan ID pesanan
            $pengiriman = Pengiriman::where('order_id', $orderId)->first();
            // dd($pengiriman);
        // Jika data pengiriman ditemukan, tampilkan detail pengiriman
        if ($pengiriman) {
            return view('customer.Pengirimandetail', compact('pengiriman'));
        } else {
            // Jika tidak ditemukan, tampilkan pesan error atau redirect ke halaman sebelumnya
            return redirect()->back()->with('error', 'Pengiriman belum diproses oleh admin. Tunggu admin memproses pesanan anda');
        }
        
        }
        public function updateDeliveryStatus($id)
    {
        // Cari pengiriman berdasarkan ID
        $pengiriman = Pengiriman::findOrFail($id);
        $order = Order::findOrFail($pengiriman->order_id);

        // Perbarui status pengiriman menjadi Selesai
        $pengiriman->status = 'Selesai';
        $pengiriman->save();

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Urai id_barang dan nama_produk JSON menjadi array
        $idBarangArray = json_decode($order->id_barang, true);
        $namaProdukArray = json_decode($order->namaproduk, true);

        // Simpan data ke history_pembelian
        $history = new HistoryPembelian();
        $history->user_id = $user->id; // Ambil ID pengguna yang sedang login
        // $history->order_id = $order->id; // Gunakan ID pesanan yang terkait dengan pengiriman
        $history->id_barang = json_encode($idBarangArray); // Simpan sebagai JSON
        $history->namaproduk = json_encode($namaProdukArray); // Simpan sebagai JSON
        $history->nama = $order->recipient_name; // Gunakan nama penerima pengiriman
        $history->total_price = $order->total_price;
        $history->address = $order->address;
        $history->kodepos = $order->kodepos;
        $history->city = $order->city;
        $history->phone = $order->phone;
        $history->status = 'Selesai';
        $history->save();
        $order->delete();
        

        // Redirect kembali ke halaman detail pengiriman dengan pesan sukses
        return redirect()->route('transaction')->with('success', 'Pesanan telah selesai, Berikan review pada history pesanan ');
    }
        
        public function updateOrderStatus($orderId)
        {
            // Temukan pesanan berdasarkan ID
            $order = Order::find($orderId);

            // Pastikan pesanan ditemukan
            if ($order) {
                // Ubah status pesanan menjadi "paid"
                $order->status = 'paid';
                $order->save();


                $transaction = new transactions();
                $transaction->amount = $order->total_price;
                $transaction->save();
                return redirect()->back()->with('message', 'Status pesanan berhasil diperbarui.');

            }
            
            // dd($orderId);

            // Jika pesanan tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
            
}