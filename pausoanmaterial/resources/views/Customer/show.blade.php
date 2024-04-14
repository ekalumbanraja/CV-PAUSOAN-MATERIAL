@extends("layouts.customer")
@section("css")
<style>

</style>

@endsection

@section("content")
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                
                <aside class="col-lg-6">
                    <div class="container">
                        <img src="{{ asset('images/' . $product->image) }}" style="width:100%">
                    </div>
                </aside>
                
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product->product_name }} 
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <!-- Rating and orders information -->
                        </div>

                        <div class="mb-3">
                            <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="unit">/item</span>
                        </div>
                        <div class="row">
                            <p>About :</p>
                        </div>

                        <p>
                            {{ $product->description }}
                        </p>

                        <div class="row mb-4" id="productSection">
                            <!-- col.// -->
                            <div class="col-md-12 col-12 mb-3">
                                <label class="mb-2 d-block">Quantity : {{$product->name}}  <b>{{$product->stok}}</b> tersedia</label>
                                <div class="input-group mb-3 quantity-operations" style="width: 170px;">
                                </div>
                                <div class="">
                                    </div>
                                </div>
                                <form action="{{ route('addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idProduct" value="{{ $product->id }}">
                                    <input type="hidden" name="stok" value="{{ $product->stok }}">
                                    <input type="hidden" name="totalPrice" id="totalPriceInput" value="{{ $product->price }}"> <!-- Input hidden untuk menyimpan nilai totalPrice -->
                                    <div class="input-group mb-3 quantity-operations" style="width: 170px;">
                                        <button type="button" class="btn btn-white border border-secondary px-3 decrease">-</button>
                                        <input type="text" class="form-control text-center border border-secondary quantity"
                                               value="1" aria-label="Example text with button addon" id="qty" min="1" max="{{ $product->stok }}"
                                               name="qty" aria-describedby="button-addon1"/>
                                        <button type="button" class="btn btn-white border border-secondary px-3 increase">+</button>
                                    </div>
                                    total: <span id="totalPrice" class="price">{{ number_format($product->price, 0, ',', '.') }}</span>
                                    <br>
                                    <button type="submit" class="btn btn-outline-primary" style="font-size:24px">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </form>
                                <div id="cartNotification" class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1050; display: none;">
                                    <div class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-body">
                                            Produk berhasil ditambahkan ke keranjang!
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            

                         
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Review section -->
    {{-- <section class="border-top py-4">
        <div class="container">
            <!-- Review form for logged-in users -->
            <!-- Display reviews -->
        </div>
    </section> --}}
@endsection
@section("script")
<script>
    $(document).ready(function() {
        // Handle click on Add to Cart button
        $('.addToCartBtn').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            // Kirim AJAX request ke backend untuk menambahkan produk ke keranjang belanja
            $.ajax({
                type: "POST", // Atur metode HTTP sesuai dengan backend Anda
                url: "{{ route('addToCart') }}", // Atur URL sesuai dengan rute backend Anda
                data: {
                    product_id: productId,
                    // Anda juga dapat mengirim data tambahan jika diperlukan
                },
                success: function(response) {
                    // Tanggapan dari backend (misalnya, sukses atau gagal)
                    console.log(response);
                    // Tampilkan notifikasi
                    $('#cartNotification').fadeIn().delay(2000).fadeOut(); // Tampilkan notifikasi selama 2 detik
                }
            });
        });
    });
</script>
    <script>
       document.addEventListener("DOMContentLoaded", function() {
    var increaseButton = document.querySelector('.increase');
    var decreaseButton = document.querySelector('.decrease');
    var quantityInput = document.getElementById('qty');
    var maxStock = {{ $product->stok }};
    var pricePerItem = parseInt("{{ $product->price }}");

    function updatePrice() {
        var currentValue = parseInt(quantityInput.value);
        var totalPrice = currentValue * pricePerItem;
        document.getElementById('totalPrice').innerText = totalPrice.toLocaleString('id-ID');
        document.getElementById('totalPriceInput').value = totalPrice; // Update nilai input hidden totalPrice
    }

    increaseButton.addEventListener('click', function() {
        var currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue < maxStock) {
            quantityInput.value = currentValue + 1;
            updatePrice();
            // Cek apakah jumlah mencapai stok maksimum setelah penambahan
            if (parseInt(quantityInput.value) === maxStock) {
                // Nonaktifkan tombol "increase" jika jumlah mencapai stok maksimum
                increaseButton.disabled = true;
            }
        }
    });

    decreaseButton.addEventListener('click', function() {
        var currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updatePrice();
            // Aktifkan kembali tombol "increase" jika tombol "decrease" diklik
            increaseButton.disabled = false;
        }
    });

    quantityInput.addEventListener('input', function() {
        var currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && (currentValue < 1 || currentValue > maxStock)) {
            // Reset nilai input jika tidak valid
            quantityInput.value = 1;
            // Aktifkan kembali tombol "increase" jika nilai input diubah secara manual
            increaseButton.disabled = false;
        }
        updatePrice();
    });
});

    </script>

@endsection
