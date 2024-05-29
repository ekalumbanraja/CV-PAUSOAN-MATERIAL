@extends('layouts.customer2')

@section('css')
<style>
.button-container {
    display: flex;
    align-items: center; /* Centers items vertically */
    gap: 10px; /* Adjust the gap between buttons */
}

.button-container .btn {
    margin: 0; /* Remove default margin if any */
}

.button-container .btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 15px; /* Adjust padding as needed */
    height: 40px; /* Adjust height as needed to match <a> */
    width: 40px; /* Adjust width as needed */
    text-align: center;
}

.text-success {
        color: green;
    }
    .text-danger {
        color: red;
    }
    .status{
        background-color: red;
    }
    .btn.success {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn.success:hover {
        background-color: #218838;
    }

    .btn.danger {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn.danger:hover {
        background-color: #c82333;
    }

    /* Custom pagination styles */
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        color: #007bff;
        text-decoration: none;
    }

    .pagination li a:hover {
        color: #0056b3;
    }

    .pagination .active a {
        color: white;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
@endsection

@section('content')
<?php

use Dompdf\Dompdf;
use Dompdf\Options;

?>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/dua.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
    My order
    </h2>
</section>	
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Penerima</th>
                            <th>Nama Barang</th>
                            <th>Total Harga</th>
                            {{-- <th>NO HP </th> --}}
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->recipient_name }}</td>
                            <td>
                                @foreach(json_decode($order->namaproduk) as $productName)
                                    {{ $productName }} <br>
                                @endforeach
                            </td>
                            <td>{{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
                            {{-- <td>{{ $order->phone }}</td> --}}
                           <td>
                            <a href="#" class="statuss @if ($order->status == 'paid') text-success @elseif ($order->status == 'unpaid') text-danger @endif" id="status_{{ $order->id }}">
                                @if ($order->status == 'paid')
                                    sudah bayar
                                @elseif ($order->status == 'unpaid')
                                    belum bayar
                                @else
                                    {{ $order->status }}
                                @endif
                            </a>
                            
                        </td>
                        <td class="button-container">
                            @if($order->status === 'paid')
                                <a href="{{ route('cekPengiriman', $order->id) }}" class="btn btn-dark"><span class="mdi mdi-truck-delivery"></span></a>
                                <button class="btn btn-info" onclick="printStruk({{ $order->id }})"><span class="mdi mdi-printer"></span></button>
                            @else
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><span class="mdi mdi-delete-forever"></span></button>
                                </form>
                                <button class="btn btn-success pay-button" data-snap-token="{{ $order->snap_token }}"><span class="mdi mdi-cash-100"></span></button>
                            @endif
                        </td>
                        
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div> --}}
        </div>
    </div>
</div>

<br><br><br><br>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        var payButtons = document.querySelectorAll('.pay-button');
        payButtons.forEach(function(button) {
            button.addEventListener('click', function () {
                var snapToken = this.getAttribute('data-snap-token');
                snap.pay(snapToken, {
                    onSuccess: function (result) {
                        Swal.fire({
                            title: "Pembayaran Berhasil!",
                            text: "Pesanan Anda telah dibayar.",
                            icon: "success"
                        }).then(() => {
                            const orderId = result.order_id;
                            window.location.href = '{{ url("updateOrderStatus") }}/' + orderId;
                        });
                    },
                    onPending: function (result) {
                        Swal.fire({
                            title: "Menunggu Pembayaran",
                            text: "Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran Anda.",
                            icon: "info"
                        });
                    },
                    onError: function (result) {
                        Swal.fire({
                            title: "Pembayaran Gagal",
                            text: "Terjadi kesalahan saat memproses pembayaran Anda. Silakan coba lagi.",
                            icon: "error"
                        });
                    },
                    onClose: function () {
                        Swal.fire({
                            title: 'Popup Ditutup',
                            text: 'Anda menutup popup tanpa menyelesaikan pembayaran.',
                            icon: 'warning'
                        });
                    }
                });
            });
        });
    });      

    
function printStruk(orderId) {
        window.location.href = '/print-struk/' + orderId;
    }
</script>
@endsection
