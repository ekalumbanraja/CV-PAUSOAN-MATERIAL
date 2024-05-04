@extends('layouts.customer')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div>
    {{-- @if ($cartItems->isEmpty())
        <div class="container px-3 my-5 clearfix">
            <p>Keranjang belanja Anda kosong.</p>
        </div>
    @else --}}
        {{-- <form action="#" method="POST" id="cartForm">
            @csrf --}}
            <div class="card">
                {{-- <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Product name</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="text-right font-weight-semibold align-middle p-4">{{ $item->product->product_name }}</td>
                                    <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ number_format($item->productPrice,0, ',', '.') }}</td>
                                    <td class="align-middle p-4">
                                        <form action="{{ route('products.decrement', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="quantity-btn">-</button>
                                        </form>
                                        <p class="quantity-text" min="1" max="{{ $item->product->stok }}">{{ $item->stok }}</p>
                                        <form action="{{ route('products.increment', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="quantity-btn">+</button>
                                        </form>
                                        
                                    </td>                                    
                                    <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-center align-middle px-0">
                                        <form action="{{ route('cart.remove', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Remove"><i class="fas fa-times"></i></button>
                                        </form>                                            
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="mt-4"></div>
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large" id="totalPrice"><strong>Rp {{ $totalPriceIDR }}</strong></div>
                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <div class="text-right mt-4">
                            <div class="text-center mt-4">
                                {{-- <form action="{{ route('checkout') }}" method="GET"> --}}
                                    {{-- <button type="submit" class="btn btn-primary">Proceed To Checkout</button> --}}
                                {{-- </form> --}}
                                <a type="submit" class="btn btn-primary" href="{{ route('checkout') }}">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
    {{-- @endif --}}
@endsection
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var quantities = document.querySelectorAll('.quantity');
    quantities.forEach(function(quantity) {
        quantity.addEventListener('change', function() {
            var row = this.closest('tr');
            var price = parseRupiah(row.querySelector('.font-weight-semibold:nth-child(2)').innerText); // Parsing harga dalam format Rupiah
            var totalCell = row.querySelector('.font-weight-semibold:nth-child(4)');
            var total = parseInt(this.value) * price;
            totalCell.innerText = formatRupiah(total); // Memformat total sebagai Rupiah
            updateTotalPrice();
        });
    });

    function updateTotalPrice() {
        var total = 0;
        var totalCells = document.querySelectorAll('.font-weight-semibold:nth-child(4)');
        totalCells.forEach(function(cell) {
            var price = parseRupiah(cell.innerText); // Parsing total dalam format Rupiah
            total += price;
        });
        document.getElementById('totalPrice').innerHTML = '<strong>' + formatRupiah(total) + '</strong>'; // Memformat total sebagai Rupiah
    }


    // Call updateTotalPrice function when the page loads
    updateTotalPrice();
});

// Function to parse Rupiah string to number
function parseRupiah(angka) {
    return parseInt(angka.replace(/[^0-9]/g, ''), 10);
}

// Function to format number to Indonesian Rupiah format
function formatRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++) {
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    }
    return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}



</script>
@endsection
