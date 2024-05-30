<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\transactions;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlyIncomeExport;

class ExcelController extends Controller
{
    // public function exportExcel()
    // {
    //     // Query data produk dari database dengan status 'paid'
    //     $paidOrders = Order::where('status', 'paid')->get();

    //     // Header untuk file Excel
    //     $headers = [
    //         "Content-type" => "text/csv",
    //         "Content-Disposition" => "attachment; filename=paid_orders.csv",
    //         "Pragma" => "no-cache",
    //         "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
    //         "Expires" => "0"
    //     ];

    //     // Fungsi untuk menulis data ke file CSV
    //     $callback = function () use ($paidOrders) {
    //         $file = fopen('php://output', 'w');

    //         // Header kolom
    //         fputcsv($file, ['Order ID', 'Total Price', 'Created At']);

    //         // Data order
    //         foreach ($paidOrders as $order) {
    //             // Menyimpan data order dalam array
    //             $row = [
    //                 $order->id,
    //                 $order->total_price,
    //                 $order->created_at->format('Y-m-d')
    //             ];

    //             // Menulis data order ke dalam file CSV
    //             fputcsv($file, $row);
    //         }

    //         fclose($file);
    //     };

    //     // Mengembalikan response dengan file CSV yang akan diunduh
    //     return Response::stream($callback, 200, $headers);
    // }
public function monthlyIncome()
{
    $monthlyIncome = transactions::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as total_income')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

    // Mengirim data ke view
    return view('admin.excel.monthly_income', ['monthlyIncome' => $monthlyIncome]);
}


    public function exportExcel()
    {
        return Excel::download(new MonthlyIncomeExport, 'monthly_income.xlsx');
    }
}
