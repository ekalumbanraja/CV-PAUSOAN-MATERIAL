<?php
 
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\HistoryPembelian;
 
class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
 

    // public function index()
    // {
    //     return view('Customer/home');
    // }
 

    public function managerHome()
    {
        return view('Manager/dashboardManager');
    }

    public function adminHome()
    {
        $sales = transactions::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(amount) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $totalProducts = Product::count();
        $totalcategory = Category::count();
        $totalpesanan = HistoryPembelian::count();
        $totalPaidOrders = transactions::all()->sum('amount');
        $labels = $sales->pluck('month');
        $data = $sales->pluck('total');
        return view('Admin/dashboardAdmin',compact('labels', 'data','totalProducts','totalcategory','totalpesanan','totalPaidOrders'));
    }

    public function adminHomee()
{
    $sales = transactions::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(amount) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $totalProducts = Product::count();
    $totalcategory = Category::count();
    $totalpesanan = HistoryPembelian::count();
    $totalPaidOrders = transactions::all()->sum('amount');
    
    $labels = $sales->pluck('month')->map(function($item) {
        return \Carbon\Carbon::parse($item)->format('M Y');
    });
    $data = $sales->pluck('total');
    
    return view('Admin/dashboardAdmin2', compact('labels', 'data', 'totalProducts', 'totalcategory', 'totalpesanan', 'totalPaidOrders'));
}

    public function test()
    {
        return view('Admin/test');
    }


    public function adminProduct()
    {
        return view('Admin/product');
    }

    public function welcome2()
    {
        return view('Customer/home2');
    }


}