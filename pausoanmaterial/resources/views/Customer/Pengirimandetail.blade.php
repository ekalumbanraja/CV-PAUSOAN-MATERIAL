@extends('layouts.customer2')
@section('css')
<style>
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

@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #000000
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #000000;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #000000;
    border-color: #000000;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #020000;
    border-color: #000000;
    border-radius: 1px
}
</style>

@endsection
@section('content')
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Detail pengiriman
    </h2>
</section>
<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: {{ $pengiriman->order_id }}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Hubungi</strong> <br> Pausoan, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br>{{ $pengiriman->status }}</div>
                    <div class="col"> <strong>Address:</strong> <br> {{ $pengiriman->alamat }} </div>
                </div>
            </article>

            <div class="track">
                <div class="step {{ $pengiriman->status == 'diproses' || $pengiriman->status == 'dikirim' || $pengiriman->status == 'selesai' ? 'active' : '' }}">
                    <span class="icon"> <i class="fa fa-user"></i> </span>
                    <span class="text"> Picked by courier</span>
                </div>
                <div class="step {{ $pengiriman->status == 'dikirim' || $pengiriman->status == 'selesai' ? 'active' : '' }}">
                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                    <span class="text"> On the way </span>
                </div>
                <div class="step {{ $pengiriman->status == 'selesai' ? 'active' : '' }}">
                    <span class="icon"> <i class="fa fa-check"></i> </span>
                    <span class="text">Selesai</span>
                </div>
            </div>
            <hr>
            <a href="/transaction" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            @if($pengiriman->status !== 'selesai')
            <form action="{{ route('updateDeliveryStatus', $pengiriman->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Pesanan telah sampai</button>
            </form>
            @else
            <span class="text-danger">Pesanan ini sudah masuk ke history pemesanan</span>
            @endif
        </div>
    </article>
</div>

@endsection
@section('scripts')
{{-- <script>
     const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');

    // If error message exists, show Sweet Alert
    if (errorMessage) {
        swal({
            title: "Error",
            text: errorMessage,
            icon: "error",
        });
    }
</script> --}}
@endsection