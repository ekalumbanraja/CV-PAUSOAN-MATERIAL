@extends('layouts.customer')

@section('content')
    @if ($cartItems->isEmpty())
        <div class="container px-3 my-5 clearfix">
            <p>Keranjang belanja Anda kosong.</p>
        </div>
    @else
        <form action="#" method="POST" id="cartForm">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div>
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
                                            <input type="number" id="quantity_{{ $item->id }}" name="quantities[]" class="form-control text-center quantity" value="{{ $item->stok }}" min="1" max="{{ $item->product->stok }}">
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-center align-middle px-0">
                                            <a href="{{ route('cart.delete', $item->id) }}" class="close float-none text-danger remove-product" title="Remove">×</a>
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
                        <button type="submit" class="btn btn-lg btn-primary mt-2">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
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

    // Function to handle product removal
    var removeButtons = document.querySelectorAll('.remove-product');
    removeButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var row = this.closest('tr');
            row.remove();
            updateTotalPrice();
        });
    });

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
