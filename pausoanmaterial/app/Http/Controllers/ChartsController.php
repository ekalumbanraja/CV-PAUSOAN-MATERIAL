<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function revenueChartData()
{
    $data = Order::select(
        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
        DB::raw('SUM(total_price) as total_revenue')
    )
    ->where('status', 'paid')
    ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
    ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
    ->get();

    dd($data); // untuk memastikan data yang dikirimkan ke tampilan
    
    return response()->json($data);
}

}
