<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class PemesananItem extends Model
{
    protected $fillable = ['pemesanan_id', 'menu_id', 'quantity', 'total_price'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    // Set total price based on menu price and quantity
    public function calculateTotalPrice()
    {
        $this->total_price = $this->quantity * $this->menu->price;
        $this->save();
    }

    protected static function booted()
    {
        static::saving(function ($item) {
            $item->total_price = $item->quantity * ($item->menu->price ?? 0);
        });
    }
    
}
