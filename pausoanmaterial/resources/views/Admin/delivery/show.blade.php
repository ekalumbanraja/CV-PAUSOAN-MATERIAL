@extends('layouts.admin')
@section('title', 'Delivery Details')

@section('content')
<div class="breadcomb-area">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delivery Details</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
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
                            <td>
                                <a href="{{ route('admin.delivery.updateStatusForm', $pengiriman->id) }}" class="btn btn-primary">Update Status</a>
                            </td>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
