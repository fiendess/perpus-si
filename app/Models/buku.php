<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',     
        'jumlah_buku',
        'status',
        'id_kategori'
    ];
    
    public function kategori_buku()
    {
        return $this->belongsTo(kategori_buku::class, 'id_kategori');
    }


}
