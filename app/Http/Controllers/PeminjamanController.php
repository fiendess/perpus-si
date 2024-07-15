<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use App\Models\kategori_buku;
use Carbon\Carbon;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all(); 
        return view('dashboard.admin.peminjaman', [
            'title' => 'Data Peminjaman',
            'peminjaman' => $peminjaman,
            'buku' => Buku::all()
        ]);

   
}

    public function search()
    {
        return view('dashboard.admin.peminjaman', [
            'title' => 'Data Peminjaman',
            'peminjaman' => peminjaman::latest()->filter(request(['search']))->get(),
            'buku' => Buku::all(),
            'user' => User::all()

        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create-peminjaman', [
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
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date',
        'status' => 'required|string'
    ]);

        // Kurangi jumlah buku yang tersedia
        $buku = Buku::findOrFail($validatedData['id_buku']);
        if ($buku->jumlah_buku < 1) {
            return redirect('/dashboard/peminjaman')->with('error', 'Stok Buku Habis!');
        }
        $buku->decrement('jumlah_buku');

        $validatedData['tanggal_jatuh_tempo'] = $validatedData['tanggal_kembali'];

        Peminjaman::create($validatedData);


        return redirect('/dashboard/peminjaman')->with('success', 'Data Peminjaman Berhasil Ditambahkan');
    }

     public function jumlahPeminjaman()
    {
        // Menghitung jumlah buku yang dipinjam oleh user yang sedang login
        $jumlahPeminjaman = Peminjaman::where('id_user', Auth::id())->count();

        return view('dashboard.user.index', [
            'title' => 'Dashboard User',
            'jumlahPeminjaman' => $jumlahPeminjaman
        ]);
    }
}
