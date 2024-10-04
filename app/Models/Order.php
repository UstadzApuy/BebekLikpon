<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['pelanggan_id', 'total'];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'pelanggan_id'); // Pastikan relasi ke model User
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('quantity'); // Hubungkan ke model Menu
    }
}

