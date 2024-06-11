<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PengirimanStatusUpdated;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Pengiriman;

use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\Auth;
use App\Notifications\PesananDibayar;


class AdminController extends Controller

{
    
    public function index (){
        // $data = category::all();
        $data = Category::paginate(7); 
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
    
    public function transaction()
    {
        $orders = Order::where('status', 'paid')->get();
        return view('admin.transaction.transaction', compact('orders'));

    }
    public function markAsPaid($id)
    {
        $order = Order::findOrFail($id);
        
        // Notify the customer
        $customer = User::findOrFail($order->user_id);
        $customer->notify(new PesananDibayar);
        
        // Create a new shipping record
        $pengiriman = new Pengiriman();
        $pengiriman->order_id = $order->id;
        $pengiriman->alamat = $order->address; // Assume shipping address is the same as order address
        $pengiriman->save();
        
        // Redirect back with a success message
        return redirect()->route('admin.delivery.show', $pengiriman->id)->with('success', 'Pengiriman sudah dikonfirmasi');
    }
    public function cekPengiriman($id)
{
    $order = Order::findOrFail($id);

    // Check if there is any shipping record related to this order
    $pengiriman = Pengiriman::where('order_id', $order->id)->first();

    if (!$pengiriman) {
        // If there is no shipping record, it means the delivery is not processed yet
        return response()->json(['status' => 'error', 'message' => 'Pengiriman belum diproses oleh admin.']);
    }

    // If there is a shipping record, proceed with your current logic
    // For example, redirect to the delivery detail page
    return redirect()->route('admin.delivery.show', $pengiriman->id);
}

    
    public function delivery()
    {
        $pengiriman = Pengiriman::paginate(10);
        return view('admin.delivery.delivery', compact('pengiriman'));
    }

    public function show($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        return view('admin.delivery.show', compact('pengiriman'));
    }
    public function updateStatusForm($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        return view('admin.delivery.update-status-form', compact('pengiriman'));
    }
    public function updateStatus(Request $request, $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->status = $request->status;
        $pengiriman->save();

        // Mengirim notifikasi ke pelanggan
        $order = $pengiriman->order;
        $customer = User::findOrFail($order->user_id);

        $customer->notify(new PengirimanStatusUpdated($pengiriman));

        return redirect()->route('admin.delivery.show', $id)->with('success', 'Status pengiriman berhasil diperbarui.');
    }

    
}
