@extends('layouts.customer2')

@section('content')
{{-- <div class="hero">
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
</div> --}}
{{-- 
@if ($cartItems->isEmpty())
    <div class="container px-3 my-5 clearfix">
        <p>Keranjang belanja Anda kosong.</p>
    </div>
@else
    <div class="card">
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
                        <a type="submit" class="btn btn-primary" href="{{ route('checkout') }}">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
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
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-2"></th>

                            </tr>
                            @foreach ($cartItems as $item)

                            <tr class="table_row">
                                {{-- <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="images/item-cart-04.jpg" alt="IMG">
                                    </div>
                                </td> --}}
                                <td class="column-2">{{ $item->product->product_name }}</td>
                                <td class="column-3">Rp.{{ number_format($item->productPrice,0, ',', '.') }}</td>
                                <td class="column-4">
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
                                
                                
                                <td class="column-5">Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
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

                    <div class="flex-w flex-t bor12 p-b-13">
                        {{-- <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div> --}}

                        {{-- <div class="size-209">
                            <span class="mtext-110 cl2">
                                $79.65
                            </span>
                        </div> --}}
                    </div>

                        {{-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or contact us if you need any help.
                                </p>
                                
                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Calculate Shipping
                                    </span>

                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="time">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                    </div>
                                    
                                    <div class="flex-w">
                                        <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                            Update Totals
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div> --}}

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
                    <a href="{{ route('checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" >
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
