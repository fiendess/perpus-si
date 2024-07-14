<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori_buku;
use App\Models\buku;


class KategoriController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.kategori', [
            'title' => 'Data Kategori',
            'kategori' => kategori_buku::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create-kategori', [
            'title' => 'Tambah Kategori',
             'kategori_buku' => kategori_buku::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        kategori_buku::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/dashboard/kategori')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function edit(kategori_buku $kategori)
    {
        return view('dashboard.admin.edit-kategori', [
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, kategori_buku $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('dashboard.kategori.index');
    }

    public function destroy(kategori_buku $kategori)
    {
        $kategori->delete();
        return redirect()->route('dashboard.kategori.index');
    }
}
