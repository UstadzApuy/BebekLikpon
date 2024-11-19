<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('frontend.menu', compact('menus')); // Only pass the 'menus' variable
    }
    
    public function show(Menu $menu)
    {
        // Fetch related menu items (excluding the current one)
        $related_menu = Menu::where('id', '!=', $menu->id)->get();

        return view("frontend.detail", compact('menu', 'related_menu'));
    }
}
