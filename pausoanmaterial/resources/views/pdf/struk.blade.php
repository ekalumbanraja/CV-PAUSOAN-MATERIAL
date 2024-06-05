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
{{-- 
<html>
<head>
<title>Faktur Pembayaran</title>
<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
<center>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>CV PAUSOAN MATERIAL</b></span></br>
BONAN DOLOK III kel.Bonan Dolok III kec.BaligeBONAN DOLOK III kel.Bonan Dolok III kec.Balige</br>
Telp : 081234567829
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
No Trans. : 4</br>
Tanggal :06 Januari 2016</br>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Nama Pelanggan :{{ $order->recipient_name }} </br>
Alamat : {{ $order->address }} {{ $order->city }} 
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : -
</td>
</table>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
  
<tr align='center'>
<td width='10%'>Kode Barang</td>
<td width='20%'>Nama Barang</td>
<td width='13%'>Harga</td>
<td width='4%'>Qty</td>
<td width='7%'>Discount</td>
<td width='13%'>Total Harga</td>
<tr><td>T501F</td>
<td>Asus Zenfone 5</td>
<td>Rp2.400.000,00</td>
<td>1</td>
<td>Rp0,00</td>
<td style='text-align:right'>Rp2.400.000,00</td>
<tr><td>T12</td><td>Tinta</td>
<td>Rp60.000,00</td>
<td>1</td>
<td>Rp0,00</td>
<td style='text-align:right'>Rp60.000,00</td></tr>
  
<tr>
<td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td>
<td style='text-align:right'>Rp2.460.000,00</td>
</tr>
<tr>
<td colspan = '6'><div style='text-align:right'>Terbilang : Dua Juta Empat Ratus Enam Puluh  Ribu  Rupiah</div></td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>Cash : </div></td>
<td style='text-align:right'>Rp2.460.000,00</td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>Kembalian : </div></td><td style='text-align:right'>Rp0,00</td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>DP : </div></td>
<td style='text-align:right'>Rp0,00</td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>Sisa : </div></td>
<td style='text-align:right'>Rp0,00</td></tr>
</table>
  
<table style='width:650; font-size:7pt;' cellspacing='2'>
<tr>
<td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
<td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
<td align='center'>TTD,</br></br><u>(...........)</u></td>
</tr>
</table>
</center>
</body>
</html> --}}
