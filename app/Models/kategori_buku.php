<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_buku extends Model
{
    use HasFactory;

     protected $table = 'kategori_buku';

    protected $fillable = [
        'nama_kategori'

    ];

    public function buku()
    {
        return $this->hasMany(buku::class, 'id_kategori');
    }
}
