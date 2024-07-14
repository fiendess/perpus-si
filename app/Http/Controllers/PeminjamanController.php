<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use App\Models\kategori_buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all(); 
        return view('dashboard.admin.peminjaman', [
            'title' => 'Data Peminjaman',
            'peminjaman' => $peminjaman
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.peminjaman', [
            'title' => 'Tambah Peminjaman',
            'buku' => Buku::all(),
            'user' => User::all()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_buku' => 'required|exists:buku,id',
            'id_user' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'tanggal_jatuh_tempo' => 'required'
        ]);

        Peminjaman::create($validatedData);

        return redirect('/dashboard/peminjaman')->with('success', 'Data Peminjaman Berhasil Ditambahkan');
    }


}
