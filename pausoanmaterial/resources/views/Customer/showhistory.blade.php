@extends('layouts.customer')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->product_name }}</h2>
            <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p>{{ $product->description }}</p>
        </div>
    </div>
    <a href="{{ route('history.orders') }}" class="btn btn-primary mt-3">Back to Order History</a>
</div>
@endsection
