<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategori_buku;
use App\Models\User;
use App\Models\peminjaman;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $bukuCount = buku::count();
        $kategoriCount = kategori_buku::count();
        $userCount = user::count();
        return view('dashboard.admin.index', [
            'title' => 'Dashboard Admin',
            'bukuCount' => $bukuCount,
            'kategoriCount' => $kategoriCount,
            'userCount' => $userCount

        ]);
    }

    public function user()
    {
        return view('dashboard.user.index', [
            'title' => 'Dashboard User',
            'user' => User::all()
        ]);
    }

    public function getDataUser()
    {
        $user = User::all();
        return view('dashboard.admin.user', [
            'title' => 'Data User',
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.admin.create', [
            'title' => 'Tambah Buku',
            'kategori_buku' => kategori_buku::all(),
            'user' => User::all()
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
