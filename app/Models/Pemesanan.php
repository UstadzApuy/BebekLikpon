<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'status',
        'unique_code',
        'payment_proof',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PemesananItem::class);
    }

// Optional: Add a computed attribute for total order price
    public function getTotalOrderPriceAttribute()
    {
        return $this->items->sum('total_price');
    }

    public function getItemsSummaryAttribute()
    {
        return $this->items->map(function ($item) {
            $quantity = $item->quantity;
            $name = $item->menu->title;
            $totalPrice = number_format($item->quantity * $item->menu->price, 0, ',', '.');
            return "\n (x{$quantity}) {$name} || {$totalPrice}";
        })->join("\n ");
    }


}
