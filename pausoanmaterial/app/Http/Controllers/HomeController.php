<?php
 
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
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
        return view('Admin/dashboardAdmin');
    }
    public function adminProduct()
    {
        return view('Admin/product');
    }


}