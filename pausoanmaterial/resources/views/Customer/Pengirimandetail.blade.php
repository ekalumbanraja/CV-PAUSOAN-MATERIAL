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
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
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
  <div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: OD45345345435</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <hr>
            <ul class="row">
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                        </figcaption>
                    </figure>
                </li>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                        </figcaption>
                    </figure>
                </li>
            </ul>
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
  
@endsection