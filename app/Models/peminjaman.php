<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

     protected $table = 'peminjaman';

    protected $fillable = [
        'id_user',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_jatuh_tempo',
        'denda',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku');
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->orWhereHas('buku', function ($query) use ($search) {
                    $query->where('judul', 'like', '%' . $search . '%');
                })->orWhere('id_user', 'like', '%' . $search . '%')
                ->orWhere('id_buku', 'like', '%' . $search . '%')
                ->orWhere('tanggal_pinjam', 'like', '%' . $search . '%')
                ->orWhere('tanggal_kembali', 'like', '%' . $search . '%')
                ->orWhere('tanggal_jatuh_tempo', 'like', '%' . $search . '%')
                ->orWhere('denda', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
        
        });
    }


}
