<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view("frontend.menu");
    }
    public function show(){
        return view("frontend.detail");
    }
}
