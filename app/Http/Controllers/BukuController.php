<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use App\Models\kategori_buku;
use App\Models\User;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin.buku', [
            'title' => 'Data Buku',
            'buku' => buku::all(),
            'kategori_buku' => kategori_buku::all(),
            'user' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create', [
            'title' => 'Tambah Buku',
            'kategori_buku' => kategori_buku::all(),
            'buku' => buku::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_buku' => 'required',
            // 'status' => 'required',
            'id_kategori' => 'required|exists:kategori_buku,id'
        ]);

        buku::create($validatedData);

        return redirect('/dashboard/buku')->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function search()
    {
        return view('dashboard.admin.buku', [
            'title' => 'Data Buku',
            'buku' => buku::latest()->filter(request(['search']))->get(),
            'kategori_buku' => kategori_buku::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        return view ('dashboard.admin.edit-buku', [ 
            'title' => 'Edit Buku',
            'buku' => $buku,
            'kategori_buku' => kategori_buku::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_buku' => 'required',
            'status' => 'required',
            'id_kategori' => 'required|exists:kategori_buku,id'
        ]);
        
        $buku->update($validatedData);

         return redirect('/dashboard/buku')->with('success', 'Data Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        $buku->delete();
        return redirect()->route('dashboard.buku.index')->with('success', 'Data Buku Berhasil Dihapus');
    }

    public function katalog()
    {
        return view('dashboard.user.katalog', [
            'title' => 'Katalog Buku',
            'buku' => buku::all(),
            'kategori_buku' => kategori_buku::all()
        ]);
    }
}
