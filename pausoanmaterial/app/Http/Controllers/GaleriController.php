<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::paginate(5);
        return view('admin.galery.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galery.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $galeri->gambar);
            $imagePath = $request->file('gambar')->store('galeri', 'public');
            $data['gambar'] = $imagePath;
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/' . $galeri->gambar);
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
