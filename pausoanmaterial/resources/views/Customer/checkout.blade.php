@extends('layouts.customer')

@section('content')
<div class="hero">
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
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="untree_co-section">
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
              
              {{-- <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea> --}}
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
                            {{-- <th>Total</th> --}}
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
    {{-- <input type="hidden" name="namabarang[]" value="{{ $cartItem->product->product_name }}"> --}}

  @if($cartItems->isNotEmpty())
  @foreach($cartItems as $cartItem)
    <input type="hidden" name="id_barang[]" value="{{ $cartItem->product->id }}">
    <input type="hidden" id="namaproduk[]" name="namaproduk[]" value="{{ $cartItem->product->product_name }}" />
  @endforeach
  @endif

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Place Order</button>
</div>
</form>

</div>
  
@endsection