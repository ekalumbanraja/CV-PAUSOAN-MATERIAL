    @extends('layouts.customer')

    @section('css')
    <style>
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

        /* Style untuk tombol bahaya */
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
    </style>
    @endsection

    @section('content')
    <?php

    use Dompdf\Dompdf;
    use Dompdf\Options;

    // Kode PHP lainnya yang diperlukan
    ?>

    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Transaction</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Penerima</th>
                            <th>Nama Barang</th>
                            <th>Total Harga</th>
                            <th>NO HP </th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <input type="hidden" name="snapToken" value="{{ $snapToken }}"> --}}
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->recipient_name }}</td>
                            <td>
                                @foreach(json_decode($order->namaproduk) as $productName)
                                    {{ $productName }} <br>
                                @endforeach
                            </td>
                            <td>{{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>{{ $order->phone }}</td>
                            <td><a href="#" class="status" id="status_{{ $order->id }}">{{ $order->status }}</a></td>
                    
                            <td>
                                @if($order->status === 'paid')
                                    <a href="{{ route('cekPengiriman', $order->id) }}" class="btn success">Cek Pengiriman</a>
                                    <button class="btn success" onclick="printStruk({{ $order->id }})">Print Struk</button>
                                @else
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn danger">Hapus</button>
                                    </form>
                                    <button class="pay-button" data-snap-token="{{ $order->snap_token }}">Bayar</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br>

    @endsection
    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script type="text/javascript"
        src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}">
    </script> --}}
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
        //     function updateOrderStatus(orderId) {
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             // Update status di tampilan setelah berhasil diperbarui di backend
        //             document.getElementById("status_" + orderId).innerText = "Paid";
        //         }
        //     };
        //     xhttp.open("POST", "{{ route('updateStatus', '') }}/" + orderId, true);
        //     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     xhttp.send();
        // }
    

    function printStruk(orderId) {
            window.location.href = '/print-struk/' + orderId;
        }
    </script>
    @endsection
