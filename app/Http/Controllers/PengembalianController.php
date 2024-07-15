<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return view('dashboard.admin.pengembalian', [
            'title' => 'Data Pengembalian',
            'pengembalian' => $pengembalian
        ]);
    }

    public function search()
    {
        return view('dashboard.admin.pengembalian', [
            'title' => 'Data Pengembalian',
            'pengembalian' => Pengembalian::latest()->filter(request(['search']))->get()
        ]);
    }

    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'Belum dikembalikan')->with('user', 'buku')->get();
        return view('dashboard.admin.create-pengembalian', [
            'title' => 'Tambah Pengembalian',
            'peminjaman' => $peminjaman
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_pengembalian' => 'required|date'
        ]);

        $peminjaman = Peminjaman::find($validatedData['id_peminjaman']);
        $tanggal_kembali = Carbon::parse($peminjaman->tanggal_kembali);
        $tanggal_pengembalian = Carbon::parse($validatedData['tanggal_pengembalian']);
        $denda = 0;

        if ($tanggal_pengembalian->greaterThan($tanggal_kembali)) {
            $hari_terlambat = $tanggal_pengembalian->diffInDays($tanggal_kembali);
            $denda = $hari_terlambat * 1000;
        }

        // Tambah jumlah buku yang tersedia kembali
        $buku = Buku::findOrFail($peminjaman->id_buku);
        $buku->increment('jumlah_buku');

        $validatedData['denda'] = $denda;

        Pengembalian::create($validatedData);

        $peminjaman->update(['status' => 'Sudah dikembalikan']);


        return redirect('/dashboard/pengembalian')->with('success', 'Data Pengembalian Berhasil Ditambahkan');
    }
}
