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
            'user' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        //
    }
}
