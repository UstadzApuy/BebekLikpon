<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view("frontend.homepage",compact('menus'));
    }
}
