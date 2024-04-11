@extends("layouts.customer")


@section("content")

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
                                    <button class="btn btn-white border border-secondary px-3 decrease" type="button"
                                            id="button-addon1" data-mdb-ripple-color="dark">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control text-center border border-secondary quantity"
                                           value="1" aria-label="Example text with button addon"
                                           aria-describedby="button-addon1"/>
                                    <button class="btn btn-white border border-secondary px-3 increase" type="button"
                                            id="button-addon2" data-mdb-ripple-color="dark">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-12 col-12 mb-3">
                                    @if($product->stok > 0)
                                        <form action="{{ route('checkout') }}" method="POST">
                                            @csrf
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input inventories-checkbox" name="inventory_id" type="radio"
                                                       value="{{$product->id}}" id="inventory{{$product->id}}"
                                                       data-qty="{{$product->stok}}">
                                                <label class="form-check-label" for="inventory{{$product->id}}">
                                                    Pilih
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Beli</button>
                                        </form>
                                    @else
                                        <button class="btn btn-primary" disabled>Stok Habis</button>
                                    @endif
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
document.getElementById('buyButton').addEventListener('click', function() {
    var selectedInventory = document.querySelector('input[name="inventory_id"]:checked');
    if (!selectedInventory) {
        alert('Pilih stok terlebih dahulu!');
        return;
    }

    var quantityAvailable = parseInt(selectedInventory.dataset.qty);
    if (quantityAvailable <= 0) {
        alert('Stok habis!');
        return;
    }

    // Logika untuk melanjutkan proses pembelian di sini
    // Anda dapat melakukan redirect ke halaman pembelian atau menampilkan modal pembelian
});
@endsection