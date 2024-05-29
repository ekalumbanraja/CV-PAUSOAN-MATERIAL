@extends('layouts.customer2')
@section('css')

<style>
  .cart-items {
    width: 100%;
}

.cart-item-header, .cart-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.cart-item-header {
    font-weight: bold;
}

.cart-item p {
    margin: 0;
}

.cart-total {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    font-weight: bold;
}

.place-order-button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
    text-align: center;
}

 body {
    font-family: "Montserrat", sans-serif;
    -webkit-font-smoothing: antialiased;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.product-info, .price-info {
    width: 45%;
}

span {
    font-weight: bold;
}

/*---------------------
  Cart Total Page 
-----------------------*/

button {
    width: 100%;
    height: 53px;
    background: #B0BCC2;
    border: 2px solid #B0BCC2;
    color: #ffffff;
    cursor: pointer;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    margin-top: 20px;
}

.checkout-form input[type=number],
.checkout-form input[type=text] {
    width: 100%;
    border: 0;
    padding-bottom: 12px;
    border-bottom: 2px solid #E7EBED;
    color: #838383;
    font-size: 12px;
    font-weight: 500;
    margin-bottom: 32px;
}

.cart-total-page {
    padding-top: 0;
}

.checkout-form h3 {
    color: #1e1e1e;
    margin-bottom: 75px;
    padding-bottom: 14px;
    border-bottom: 2px solid #D0D7DB;
}

.checkout-form .in-name {
    color: #1e1e1e;
    font-size: 14px;
    font-weight: 600;
    text-align: right;
    margin: 0;
    margin-top: 18px;
}

.checkout-form .order-table {
    background: #f9fbfb;
    padding: 20px;
    margin-top: 25px;
}

.checkout-form .order-table .cart-item {
    overflow: hidden;
    margin-bottom: 25px;
}

.checkout-form .order-table .cart-item span {
    display: inline-block;
    color: #838383;
    font-size: 12px;
    font-weight: 600;
}

.checkout-form .order-table .cart-item p {
    display: inline-block;
    float: right;
    color: #1e1e1e;
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}

.checkout-form .order-table .cart-total {
    overflow: hidden;
    padding-top: 20px;
    border-top: 2px solid #D0D7DB;
    margin-top: 20px;
}

.checkout-form .order-table .cart-total span {
    display: inline-block;
    color: #838383;
    font-size: 12px;
    font-weight: 600;
}

.checkout-form .order-table .cart-total p {
    display: inline-block;
    float: right;
    color: #1e1e1e;
    font-size: 18px;
    font-weight: 600;
    margin: 0;
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
      Shoping Cart > 
    </span> <span class="stext-109 cl4">
       Checkout
    </span>
  </div>
</div>
{{-- <div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div> --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 {{-- <div class="untree_co-section">
  <form action="{{ route('place-order') }}" method="POST" >
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
         <h2 class="h3 mb-3 text-black">Detail Penerima</h2> 
          <div class="p-3 p-lg-5 border bg-white">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="recipient_name" class="text-black">Nama Penerima<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="recipient_name" name="recipient_name" >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="address" class="text-black">Alamat<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Street address" >
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="city" class="text-black">Kota<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="city" name="city" >
              </div>
              <div class="col-md-6">
                <label for="kodepos" class="text-black">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="kodepos" name="kodepos" >
              </div>
            </div>
            <div class="form-group row mb-5">
              <div class="col-md-12">
                <label for="phone" class="text-black">No Handphone <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number">
              </div>
            </div>
            <div class="form-group">
              <label for="catatan" class="text-black">Catatan tambahan</label>
              <input type="text" class="form-control" id="catatan" name="catatan" placeholder="CATATAN">
              
           <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea> 
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <th>Product</th>
                            <th>Total</th>
                          <th>Total</th> 
                        </thead>
                        <tbody>
                            @foreach($cartItems as $cartItem)
                            <tr>
                              <td> <strong class="mx-2">{{ $cartItem->product->product_name }}</strong></td>
                              <td>Rp {{ number_format($cartItem->price, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                              @php
                                $totalPrice = 0;
                                foreach ($cartItems as $cartItem) {
                                    $totalPrice += $cartItem->price ;
                                }
                              @endphp
                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>Rp{{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div> 
    </div>
  </div>
  <input type="hidden" id="total_price" name="total_price" value="{{ $totalPrice }}">
  <input type="hidden" name="order_id" value="{{ rand()}}">
    <input type="hidden" name="namabarang[]" value="{{ $cartItem->product->product_name }}"> 

  @if($cartItems->isNotEmpty())
  @foreach($cartItems as $cartItem)
    <input type="hidden" name="id_barang[]" value="{{ $cartItem->product->id }}">
    <input type="hidden" id="namaproduk[]" name="namaproduk[]" value="{{ $cartItem->product->product_name }}" />
  @endforeach
  @endif

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Place Order</button>
</div>
</form>  --}}

</div> 
<br>
<section class="cart-total-page spad">
  <div class="container">
      <form action="{{ route('place-order') }}" class="checkout-form" method="POST">
        @csrf
          <div class="row">
              <div class="col-lg-12">
                  {{-- <h3>Your Information</h3> --}}
              </div>
              <div class="col-lg-9">
                  <div class="row">
                      <div class="col-lg-2">
                          <p class="in-name">Nama*</p>
                      </div>
                      <div class="col-lg-10">
                          <input type="text" placeholder="" id="recipient_name" name="recipient_name">
                      </div>
                  </div>
                  <div class="row">       
                  </div>
                  <div class="row">
                      <div class="col-lg-2">
                          <p class="in-name">Alamat</p>
                      </div>
                      <div class="col-lg-10">
                          <input type="text"id="address" name="address">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-2">
                          <p class="in-name">Kota</p>
                      </div>
                      <div class="col-lg-10">
                          <input type="text" id="city" name="city">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-2">
                          <p class="in-name">Kode Pos</p>
                      </div>
                      <div class="col-lg-10">
                          <input type="text" id="kodepos" name="kodepos" >
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-2">
                          <p class="in-name">No Handphone</p>
                      </div>
                      <div class="col-lg-10">
                          <input type="number" id="phone" name="phone" >
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2">
                        <p class="in-name">Catatan *</p>
                    </div>
                    <div class="col-lg-10">
                        <input type="text">
                        <input type="text">
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                  <div class="order-table">
                      {{-- <div class="cart-item">
                          <span>Product</span>
                       <h5></h5> 
                       @foreach($cartItems as $cartItem)
                       <div class="cart-item">
                           <div class="product-info">
                               <span>Product</span>
                               <p class="product-name">{{ $cartItem->product->product_name }}</p>
                           </div>
                           <div class="price-info">
                               <span>Price</span>
                               <p>Rp {{ number_format($cartItem->price, 0, ',', '.') }}</p>
                           </div>
                       </div>
                   @endforeach
                   


                      </div> --}}
                      {{-- <div class="cart-item">
                          <span>Quantity</span>
                          <p>1</p>
                      </div> --}}
                      {{-- <div class="cart-item">
                          <span>Shipping</span>
                          <p>$10</p>
                      </div> --}}

                      {{-- <div class="cart-total">
                        @php
                        $totalPrice = 0;
                        foreach ($cartItems as $cartItem) {
                            $totalPrice += $cartItem->price ;
                        }
                      @endphp
                          <span>Total</span>
                          <p>Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>
                      </div>
                  <button type="submit" class="btn btn-dark" >place order</button> --}}
                  <div class="cart-items">
                    <div class="cart-item-header">
                        <span>Product</span>
                        <span>Price</span>
                    </div>
                    @foreach($cartItems as $cartItem)
                        <div class="cart-item">
                            <p class="product-name">{{ $cartItem->product->product_name }}</p>
                            <p>Rp {{ number_format($cartItem->price, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="cart-total">
                    <span>Total</span>
                    @php
                    $totalPrice = 0;
                    foreach ($cartItems as $cartItem) {
                        $totalPrice += $cartItem->price ;
                    }
                  @endphp
                    <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>
                <button type="submit" class="btn btn-dark" >place order</button>
                
                  </div>
              </div>
          </div>
          <input type="hidden" id="total_price" name="total_price" value="{{ $totalPrice }}">
  <input type="hidden" name="order_id" value="{{ rand()}}">
    <input type="hidden" name="namabarang[]" value="{{ $cartItem->product->product_name }}"> 

    @if($cartItems->isNotEmpty())
    @foreach($cartItems as $cartItem)
      <input type="hidden" name="id_barang[]" value="{{ $cartItem->product->id }}">
      <input type="hidden" id="namaproduk[]" name="namaproduk[]" value="{{ $cartItem->product->product_name }}" />
    @endforeach
    @endif
      </form>
  </div>
</section>
  
@endsection