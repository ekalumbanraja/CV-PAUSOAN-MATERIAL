<?php

namespace App\Exports;

use App\Models\transactions;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyIncomeExport implements FromView
{
    public function view(): View
    {
        $monthlyIncome = transactions::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as total_income')
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        return view('admin.excel.monthly_income2', ['monthlyIncome' => $monthlyIncome]);
    }
}
