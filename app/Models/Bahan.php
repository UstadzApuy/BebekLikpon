<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'nama_bahan',
        'jumlah_stok',
        'satuan', 
        'minimum_stok', 
        'harga_terakhir', 
        'tanggal_terakhir_stok', 
    ];
}
