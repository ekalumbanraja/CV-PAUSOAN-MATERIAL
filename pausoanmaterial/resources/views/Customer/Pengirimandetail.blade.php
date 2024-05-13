@extends('layouts.customer')
@section('css')
<style>

.track-line {
height: 2px !important;
background-color: #488978;
opacity: 1;
}

.dot {

margin-left: 3px;
margin-right: 3px;
margin-top: 0px;
background-color: #488978;
border-radius: 50%;
display: inline-block
}

.big-dot {

margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
background-color: #488978;
border-radius: 50%;
display: inline-block;
}

.big-dot i {
font-size: 12px;
}

.card-stepper {
z-index: 0
}
</style>

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Pengiriman</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $pengiriman->id }}</td>
                            </tr>
                            <tr>
                                <td>Order ID</td>
                                <td>{{ $pengiriman->order_id }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $pengiriman->status }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $pengiriman->alamat }}</td>
                            </tr>
                            {{-- <td>
                                @if($pengiriman->status !== 'Selesai')
                                    <form action="{{ route('updateDeliveryStatus', $pengiriman->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Ubah Status Menjadi Selesai</button>
                                    </form> --}}
                                    {{-- <a href="{{ route('customer.selesaiPengiriman', $pengiriman->id) }}" class="btn btn-success">Selesaikan Pengiriman</a> --}}

                                {{-- @else
                                    <span class="text-success">Selesai</span>
                                @endif
                            </td>
                             --}}
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-1">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-stepper" style="border-radius: 10px;">
            <div class="card-body p-4">
  
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column">
                  <span class="lead fw-normal">Your order has been delivered</span>
                  <span class="text-muted small">by DHFL on 21 Jan, 2020</span>
                </div>
                <div>
                    @if($pengiriman->status !== 'Selesai')
                    <form action="{{ route('updateDeliveryStatus', $pengiriman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Ubah Status Menjadi Selesai</button>
                    </form>
                    {{-- <a href="{{ route('customer.selesaiPengiriman', $pengiriman->id) }}" class="btn btn-success">Selesaikan Pengiriman</a> --}}
                  
                  @else
                    <span class="text-success">Selesai</span>
                  @endif  
                  
                </div>
              </div>
              <hr class="my-4">
  
              <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                <span class="dot"></span>
                <hr class="flex-fill track-line"><span class="dot"></span>
                <hr class="flex-fill track-line"><span class="dot"></span>
                <hr class="flex-fill track-line"><span class="dot"></span>
                <hr class="flex-fill track-line"><span
                  class="d-flex justify-content-center align-items-center big-dot dot">
                  <i class="fa fa-check text-white"></i></span>
              </div>
  
              <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column align-items-start"><span>15 Mar</span><span>Order placed</span>
                </div>
                <div class="d-flex flex-column justify-content-center"><span>15 Mar</span><span>Order
                    placed</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>15
                    Mar</span><span>Order Dispatched</span></div>
                <div class="d-flex flex-column align-items-center"><span>15 Mar</span><span>Out for
                    delivery</span></div>
                <div class="d-flex flex-column align-items-end"><span>15 Mar</span><span>Delivered</span></div>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection