<?php
 
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

 
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
        $sales = Order::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_price) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $totalProducts = Product::count();
        $totalcategory = Category::count();
        $totalpesanan = Order::count();
        $totalPaidOrders = Order::where('status', 'paid')->sum('total_price');
        $labels = $sales->pluck('month');
        $data = $sales->pluck('total');
        return view('Admin/dashboardAdmin',compact('labels', 'data','totalProducts','totalcategory','totalpesanan','totalPaidOrders'));
    }
    public function adminProduct()
    {
        return view('Admin/product');
    }


}