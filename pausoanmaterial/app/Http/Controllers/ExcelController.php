<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Order;

class ExcelController extends Controller
{
    
    public function exportExcel()
    {
        $sales = Order::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        $data = $sales->map(function ($sale) {
            return ['Month' => $sale->month, 'Total Sales (IDR)' => 'Rp ' . number_format($sale->total, 0, ',', '.')];
        });
    
        return Excel::download(new OrdersExport($data), 'sales.xlsx');
    }
}
