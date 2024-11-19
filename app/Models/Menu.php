<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 
    protected $fillable = [
         'title',
          'slug', 
          'price', 
          'thumbnail', 
          'kategori', 
          'tipe', 
          'extra', 
          'description', ]; 
    protected $casts = [ 'extra' => 'string', ];
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
