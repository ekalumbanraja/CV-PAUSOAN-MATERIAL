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
                                <form action="{{ route('admin.delivery.updateStatus', $pengiriman->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                
                                    <div class="form-group">
                                        <label for="status">Update Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="diproses" {{ $pengiriman->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="dikirim" {{ $pengiriman->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                            {{-- <option value="diterima" {{ $pengiriman->status == 'diterima' ? 'selected' : '' }}>Diterima</option> --}}
                                            {{-- <option value="selesai" {{ $pengiriman->status == 'selesai' ? 'selected' : '' }}>Selesai</option> --}}
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </form>
                                {{-- <a href="{{ route('admin.delivery.updateStatusForm', $pengiriman->id) }}" class="btn btn-primary">Update Status</a> --}}
                            </td>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
