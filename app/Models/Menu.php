<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $casts = [
        'tipemasak' => 'array',
    ];

    // Menambahkan relasi many-to-many dengan Order
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
