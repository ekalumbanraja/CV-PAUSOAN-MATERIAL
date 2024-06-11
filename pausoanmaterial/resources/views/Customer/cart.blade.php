@extends('layouts.customer2')

@section('css')
<style>
/* CSS External File */
.table-shopping-cart th:nth-child(1),
.table-shopping-cart td:nth-child(1) {
    width: 40%; /* Ubah lebar kolom pertama sesuai kebutuhan */
}
.table-shopping-cart th,
.table-shopping-cart td {
    padding: 10px; /* Jarak di dalam sel tabel */
}
.table-shopping-cart th:nth-child(2),
.table-shopping-cart td:nth-child(2),
.table-shopping-cart th:nth-child(3),
.table-shopping-cart td:nth-child(3),
.table-shopping-cart th:nth-child(4),
.table-shopping-cart td:nth-child(4) {
    width: 15%; /* Sesuaikan lebar kolom kedua, ketiga, dan keempat sesuai kebutuhan */
}

.table-shopping-cart th:nth-child(5),
.table-shopping-cart td:nth-child(5) {
    width: 15%; /* Sesuaikan lebar kolom kelima sesuai kebutuhan */
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Shopping Cart
        </span>
    </div>
</div>

@if ($cartItems->isEmpty())
<div class="container px-3 my-5 clearfix">
    <p>Keranjang belanja Anda kosong.</p>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
              <div class="wrap-table-shopping-cart p-4 table-responsive">
                <table class="table-shopping-cart" style="width:100%">
                    <tr class="table_head">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                        @foreach ($cartItems as $item)
                        <tr class="table_row">
                            <td>{{ $item->product->product_name }}</td>
                            <td>Rp.{{ number_format($item->productPrice, 0, ',', '.') }}</td>
                            <td>
                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                    <form action="{{ route('products.decrement', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </button>
                                    </form>
                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $item->stok }}" min="1" max="{{ $item->product->stok }}" readonly>
                                    <form action="{{ route('products.increment', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="text-center align-middle px-0">
                                <form action="{{ route('cart.remove', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Remove">X</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <h4 class="mtext-109 cl2 p-b-30">
                    Cart Totals
                </h4>
                <div class="flex-w flex-t bor12 p-b-13"></div>
                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
                        <span class="mtext-101 cl2">
                            Total:
                        </span>
                    </div>
                    <div class="size-209 p-t-1">
                        <span class="mtext-110 cl2">
                            Rp {{ $totalPriceIDR }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var quantities = document.querySelectorAll('.quantity');
    quantities.forEach(function(quantity) {
        quantity.addEventListener('change', function() {
            var row = this.closest('tr');
            var price = parseRupiah(row.querySelector('.font-weight-semibold:nth-child(2)').innerText);
            var totalCell = row.querySelector('.font-weight-semibold:nth-child(4)');
            var total = parseInt(this.value) * price;
            totalCell.innerText = formatRupiah(total);
            updateTotalPrice();
        });
    });

    function updateTotalPrice() {
        var total = 0;
        var totalCells = document.querySelectorAll('.font-weight-semibold:nth-child(4)');
        totalCells.forEach(function(cell) {
            var price = parseRupiah(cell.innerText);
            total += price;
        });
        document.getElementById('totalPrice').innerHTML = '<strong>' + formatRupiah(total) + '</strong>';
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
