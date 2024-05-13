<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function printStruk($orderId)
    {
    // Cari order berdasarkan ID
    $order = Order::findOrFail($orderId);

    // Data yang ingin Anda tampilkan dalam PDF struk
    $data = [
        'order' => $order,
    ];

    // Render view struk ke dalam HTML
    $html = view('pdf.struk', $data)->render();

    // Konfigurasi DOMPDF
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    // Inisialisasi DOMPDF
    $dompdf = new Dompdf($options);

    // Load HTML struk ke DOMPDF
    $dompdf->loadHtml($html);

    // Rendering dan output PDF struk
    $dompdf->render();

    // Tampilkan PDF struk dalam browser
    return $dompdf->stream('struk.pdf');
    }

}
