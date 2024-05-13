@extends('layouts.admin')
@section('title', 'Delivery')

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
                                <h2>Delivery</h2>
                                <p>Welcome to Delivery <span class="bread-ntd">table</span></p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="normal-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="normal-table-list">
                    <div class="bsc-tbl">
                        <table class="table table-sc-ex">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Actions</th> <!-- Tambah kolom Actions -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengiriman as $item) 
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <a href="{{ route('admin.delivery.show', $item->id) }}" class="btn btn-info">View</a> <!-- Tambah tombol untuk melihat detail pengiriman -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
