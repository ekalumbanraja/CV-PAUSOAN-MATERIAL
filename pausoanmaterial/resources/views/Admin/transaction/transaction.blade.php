@extends('layouts.admin')
@section('title', 'Order')

@section('content')
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Transaction</h2>
                                    <p>Welcome to the Transaction table</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="normal-table-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="normal-table-list">
                                        <div class="basic-tb-hd">
                                            <!-- <h2>Basic Table</h2>
                                            <p>Basic example without any additional modification classes</p> -->
                                        </div>
                                        <div class="bsc-tbl">
                                            <table class="table table-sc-ex">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        {{-- <th>User ID</th>
                                                        <th>Product IDs</th> --}}
                                                        <th>Recipient Name</th>
                                                        <th>Total Price</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Alamat</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        {{-- <td>{{ $order->user_id }}</td>
                                                        <td>{{ $order->id_barang }}</td> --}}
                                                        <td>{{ $order->recipient_name }}</td>
                                                        <td>{{ $order->total_price }}</td>
                                                        {{-- <td>{{ $order->status }}</td> --}}
                                                        <td>{{ $order->address }}</td>
                                                        <td>
                                                            <form action="{{ route('admin.order.markAsPaid', $order->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit">Konfirmasi Pengiriman</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
