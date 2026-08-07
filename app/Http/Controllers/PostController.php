<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // return "Aqui se mostrar todos los posts";
        return view("posts.index");
    }
    public function create(){
        // return "Aqui se mostrara un formulario para crear un post";
        return view("posts.create");
    }   

    public function show(string $post){
        // return "Aqui se mostrara el post {$post}";    
        
        // compact("post"); es igual a => ["post"=>$post] y se puede usar en la vista de la siguiente manera: $post
        // return view("posts.show",[ "post"=>$post]);
        return view("posts.show",compact("post"));

    }
}
