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
        return view('dashboard.admin.peminjaman', [
            'title' => 'Data Peminjaman'
        ]);
    }
}
