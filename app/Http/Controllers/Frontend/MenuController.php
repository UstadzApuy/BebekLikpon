<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view("frontend.menu");
    }
    public function show(Menu $menu){
        return view("frontend.detail", compact('menu'));
    }
}
