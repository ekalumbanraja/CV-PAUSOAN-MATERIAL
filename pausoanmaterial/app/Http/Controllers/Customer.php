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
        
        

        // public function process(Request $request)
        // {
        //     // Validasi data checkout
        //     $request->validate([
        //         // Tambahkan validasi sesuai kebutuhan
        //     ]);
        
        //     // Buat pesanan baru
        //     $order = new Order();
        //     // Tambahkan informasi pesanan ke dalam model Order
        //     $order->user_id = auth()->id();
        //     $order->total_price = $request->total_price; // Tambahkan total harga dari formulir
        //     // Tambahkan informasi lainnya sesuai kebutuhan
        //     $order->save();
        
        //     // Simpan setiap item dari keranjang belanja ke dalam pesanan
        //     foreach ($request->input('product_id') as $key => $productId) {
        //         $orderItem = new OrderItem();
        //         $orderItem->order_id = $order->id;
        //         $orderItem->product_id = $productId;
        //         $orderItem->quantity = $request->input('quantity')[$key];
        //         // Tambahkan informasi item lainnya jika diperlukan
        //         $orderItem->save();
        //     }
        
        //     // Clear keranjang belanja setelah checkout
        //     Cart::where('user_id', auth()->id())->delete(); // Hapus semua item keranjang milik pengguna yang sedang login
        
        //     // Redirect pengguna ke halaman konfirmasi pesanan
        //     return redirect()->route('confirmation')->with('success', 'Pesanan Anda telah berhasil diproses. Terima kasih!');
        // }
    

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

            public function placeorder(Request $request)
            {
                $user = Auth::user();
                
                $validatedData = $request->validate([
                    'recipient_name' => 'required|string',
                    'address' => 'required|string',
                    'city' => 'required|string',
                    'kodepos' => 'required|string',
                    'phone' => 'required|string',
                    'total_price' => 'required|numeric',
                    'catatan' => 'required|string',
                    'id_barang' => 'required|array',
                    'id_barang.*' => 'exists:products,id',
                    'namaproduk' => 'required|array',
                    'namaproduk.*' => 'string',
                ]);
            
                // Simpan data ke dalam database
                $totalPrice = $validatedData['total_price'];
                $idBarangArray = [];
                $namaProdukArray = [];
            
                foreach($validatedData['id_barang'] as $index => $idBarang) {
                    $idBarangArray[] = $idBarang;
                    $namaProdukArray[] = $validatedData['namaproduk'][$index];
                }
            
                $order = new Order();
                $order->user_id = $user->id;
                $order->id_barang = json_encode($idBarangArray); // Simpan array ke dalam kolom JSON
                $order->namaproduk = json_encode($namaProdukArray); // Simpan array ke dalam kolom JSON
                $order->recipient_name = $validatedData['recipient_name'];
                $order->address = $validatedData['address'];
                $order->city = $validatedData['city'];
                $order->kodepos = $validatedData['kodepos'];
                $order->phone = $validatedData['phone'];
                $order->total_price = $totalPrice;
                $order->catatan = $validatedData['catatan'];
                // $order->status = 'pending';
                // $order->payment_method = $request->input('payment_method');
                $order->save();
            
                // Hapus item dari keranjang belanja setelah order berhasil ditempatkan
                Cart::where('idUser', $user->id)->delete();
                return redirect()->route('transaction')->with('success', 'Order successfully placed!');
            }
            public function transaction(){
                $user = Auth::user();

                $orders = Order::where('user_id', $user->id)->get();
                return view('Customer.transaction',compact('orders'));
            }
            public function destroy($id)
            {
                $order = Order::findOrFail($id);
                $order->delete();

                return redirect()->route('transaction')->with('success', 'Order berhasil dihapus');
            }
            
            // public function bayar(Request $request)
            // {
            //     $order = Order::create($request->all());
            //     // Set your Merchant Server Key
            //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
            //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            //     \Midtrans\Config::$isProduction = false;    
            //     // Set sanitization on (default)
            //     \Midtrans\Config::$isSanitized = true;
            //     // Set 3DS transaction for credit card to true
            //     \Midtrans\Config::$is3ds = true;

            //     $params = array(
            //         'transaction_details' => array(
            //             'order_id' => $order-> id,
            //             'gross_amount' => $order-> total_price,
            //         ),
            //         'customer_details' => array(
            //             // 'first_name' => 'budi',
            //             // 'last_name' => 'pratama',
            //             // 'email' => 'budi.pra@example.com',
            //             'phone' => $request->phone,
            //         ),
            //     );

            //     $snapToken = \Midtrans\Snap::getSnapToken($params);
            // }


            public function bayar(Request $request, $id)
            {
                // Temukan order berdasarkan ID yang diberikan
                $order = Order::findOrFail($id);
            
                // Set konfigurasi Midtrans
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                \Midtrans\Config::$isProduction = false; // Ganti menjadi true untuk produksi
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;
            
                // Data transaksi
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $order->id,
                        'gross_amount' => $order->total_price,
                    ),
                    'customer_details' => array(
                        'phone' => $order->phone,
                    ),
                );
            
                try {
                    // Dapatkan token SNAP
                    $snapToken = \Midtrans\Snap::getSnapToken($params);
            
                    // Redirect ke halaman pembayaran
                    return redirect()->away(\Midtrans\Snap::getSnapUrl($snapToken));
                } catch (\Exception $e) {
                    // Tangani jika terjadi kesalahan
                    return back()->withError($e->getMessage());
                }
            }
            




        }


 