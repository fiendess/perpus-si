<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'id_peminjaman',
        'tanggal_pengembalian',
        'denda'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->whereHas('peminjaman', function ($query) use ($search) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })->orWhereHas('buku', function ($query) use ($search) {
                        $query->where('judul', 'like', '%' . $search . '%');
                    });
                })->orWhere('tanggal_pengembalian', 'like', '%' . $search . '%')
                ->orWhere('denda', 'like', '%' . $search . '%');
        
        });
    }
}
