<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function index (){
        $data = category::all();
        return view('admin.category.category',compact('data'));
    }
    public function tampilcategory (){
        return view('admin.category.tampilcategory');
    }
    public function tambahcategory(Request $request) {
        $data = new Category;
        $data->category_name = $request->category; // Sesuaikan dengan nama input yang Anda gunakan di formulir
        $data->save();

        Alert::success('Success', 'Kategori berhasil ditambahkan');
    
        return redirect()->back();
    }

    public function deletecategory($id)
    {
        $data=category::find($id);
        $data->delete();

        return redirect()->back();

    }
    

}
