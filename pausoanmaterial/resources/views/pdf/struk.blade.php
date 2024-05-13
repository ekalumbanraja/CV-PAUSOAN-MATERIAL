<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .info {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Struk Pembayaran</h1>
        <div class="info">
            <p><strong>Nama Penerima:</strong> {{ $order->recipient_name }}</p>
            <p><strong>NO HP:</strong> {{ $order->phone }}</p>
        </div>
        <div class="info">
            <p><strong>Nama Barang:</strong></p>
            <ul>
                @foreach(json_decode($order->namaproduk) as $productName)
                    <li>{{ $productName }}</li>
                @endforeach
            </ul>
        </div>
        <div class="info">
            <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
        </div>
        <div class="info">
            <p><strong>Tanggal Pembelian:</strong> {{ $order->created_at }}</p>
            <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
            <p><strong>Nomor Transaksi:</strong> #{{ $order->id }}</p>
        </div>
        <p style="text-align: center;">Terima kasih atas pembeliannya!</p>
    </div>
</body>
</html>
