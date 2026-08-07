<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        // return "Aqui se mostrar todos los posts";
        return view("home");
    }
}