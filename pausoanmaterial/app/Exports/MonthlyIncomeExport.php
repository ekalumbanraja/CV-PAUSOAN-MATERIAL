<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyIncomeExport implements FromView
{
    public function view(): View
    {
        $monthlyIncome = Order::where('status', 'paid')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_income')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('admin.excel.monthly_income2', ['monthlyIncome' => $monthlyIncome]);
    }
}
