<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\roles;
use App\Models\buku;
use App\Models\kategori_buku;
use App\Models\Peminjaman;
use Carbon\Carbon;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {   
        $user = Auth::user();
        $peminjaman = Peminjaman::where('id_user', $user->id)->get();

        return view('dashboard.user.peminjaman', [
            'title' => 'Data Peminjaman',
            'peminjaman' => $peminjaman,
            'buku' => Buku::all()
        ]);
        
    }

    public function jumlahPeminjaman()
    {
         $user = Auth::user();
        // Menghitung jumlah buku yang dipinjam oleh user yang sedang login
        $jumlahPeminjaman = Peminjaman::where('id_user', Auth::id())->count();

         // Menghitung jumlah buku yang belum dikembalikan
        $jumlahBelumDikembalikan = Peminjaman::where('id_user', $user->id)
                                            ->where('status', 'Belum dikembalikan')
                                            ->count();

        // Menghitung jumlah buku yang terlambat dikembalikan
        $jumlahTerlambat = Peminjaman::where('id_user', $user->id)
                                     ->where('status', 'Belum dikembalikan')
                                     ->where('tanggal_jatuh_tempo', '<', Carbon::today())
                                     ->count();

        return view('dashboard.user.index', [
            'title' => 'Dashboard Anggota',
            'jumlahPeminjaman' => $jumlahPeminjaman,
            'jumlahBelumDikembalikan' => $jumlahBelumDikembalikan,
            'jumlahTerlambat' => $jumlahTerlambat
            
        ]);
    }

     public function profil()
    {
        $user = Auth::user();

        return view('dashboard.user.profil', [
            'title' => 'Profil Saya',
            'user' => $user
        ]);
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',

        ]);

        $user->update($validatedData);

        return redirect()->route('dashboard.user.profil')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
