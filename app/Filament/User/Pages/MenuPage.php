<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Models\Menu; // Import the model if needed

class MenuPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Pemesanan';

    protected static string $view = 'filament.pages.menu-page';
    public $menus; // Declare the property

    public function mount()
    {
        // Fetch menu data, for example:
        $this->menus = Menu::all(); // Adjust according to your needs
    }
}
