<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return "Aqui se mostrar todos los posts";
    }
    public function create(){
         return "Aqui se mostrara un formulario para crear un post";
    }   

    public function show($post){
        return "Aqui se mostrara el post {$post}";         
    }
}
