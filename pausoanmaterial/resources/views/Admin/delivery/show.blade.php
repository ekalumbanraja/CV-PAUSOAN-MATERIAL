@extends('layouts.admin2')
@section('title', 'Delivery Details')

@section('content')
<div class="breadcomb-area">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Delivery</h1> --}}
                </div>
                <div class="col-sm-6">
                    <br>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Delivery</li>
                        <li class="breadcrumb-item active">Delivery  Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Delivery Details</div>
                    <div class="panel-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
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
                                <tr>
                                    <td colspan="2">
                                        <form action="{{ route('admin.delivery.updateStatus', $pengiriman->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Update Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="diproses" {{ $pengiriman->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                    <option value="dikirim" {{ $pengiriman->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
