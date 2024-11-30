<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Cart;

class CartPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'keranjang';
    protected static string $view = 'filament.pages.cart-page';
    public $cart;

    public function mount()
    {
        // Ambil data cart untuk user saat ini
        $this->cart = Cart::where('user_id', auth()->id())
            ->with('menu') // Relasi ke model Menu jika ada
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->menu->title,
                    'price' => $item->menu->price,
                    'quantity' => $item->quantity,
                    'thumbnail' => $item->menu->thumbnail,
                ];
            })
            ->toArray();
    }
}
