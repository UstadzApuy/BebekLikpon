<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class CartPage extends Page
{
    protected static string $view = 'filament.pages.cart-page';
    public $cart = []; // Declare and initialize the property

    public function mount()
    {
        // You can fetch or initialize the cart here
        $this->cart = session()->get('cart', []); // Example: get cart from session
    }
}
