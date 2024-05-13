<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PengirimanStatusUpdated;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Pengiriman;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PesananDibayar;


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
    
    public function transaction()
    {
        $transactions = Order::all();
        return view('admin.transaction.transaction', compact('transactions'));

    }
    public function markAsPaid($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'paid';
        $order->save();

        $customer = User::findOrFail($order->user_id);
        $customer->notify(new PesananDibayar);
        // Auth::user()->notifications()->findOrFail($id)->markAsRead();

        $pengiriman = new Pengiriman();
        $pengiriman->order_id = $order->id;
        $pengiriman->alamat = $order->address; // asumsi alamat pengiriman sama dengan alamat pesanan
        $pengiriman->save();
        return redirect()->back()->with('success', 'Order marked as paid successfully.');
    }
    public function delivery()
    {
        $pengiriman = Pengiriman::all();
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
