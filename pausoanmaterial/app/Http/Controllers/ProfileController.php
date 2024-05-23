<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPembelian;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    // Fungsi untuk menampilkan formulir edit profil
    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('Customer.edit', compact('user')); // Menampilkan view edit profil dengan data pengguna
    }

    // Fungsi untuk memproses pembaruan profil
    public function update(Request $request)
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login

        // Validasi data yang diterima dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar (opsional)
        ]);

        // Memperbarui data pengguna sesuai dengan data yang diterima dari formulir
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika ada file gambar yang diunggah, simpan gambar tersebut
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user'), $imageName);
            $user->image = $imageName;
        }

        $user->save(); // Menyimpan perubahan data profil pengguna

        return redirect()->route('home')->with('success', 'Profil berhasil diperbarui.'); // Mengalihkan pengguna ke halaman utama dengan pesan sukses
    }


    public function historypesanan(){
        $user = Auth::user();
    
        // Mengambil riwayat pesanan pengguna yang sedang login
        $historypesanan = HistoryPembelian::where('user_id', $user->id)->get();
    
        // Mengirim data pengguna dan riwayat pesanan ke view
        return view('Customer.historypesanan', compact('user', 'historypesanan'));
    }
    

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi saat ini tidak cocok.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Kata sandi berhasil diubah!');
    }
}
