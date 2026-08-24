<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // return "Aqui se mostrar todos los posts";
        //$posts = Post::all();
        //$posts = Post::orderBy("id","desc")->get();
        $posts = Post::orderBy("id","desc")->paginate(10);
        
        return view("posts.index",["posts"=>$posts]);
        //eturn view("posts.index",compact("posts")
    }
    public function create(){
        // return "Aqui se mostrara un formulario para crear un post";
        return view("posts.create");
    }   

    // Medodo para crear registros del Formularios
    public function store(Request $request){
        // usa el metodo post
        //return $request->all();
        //return request()->all();
 
        $post = new Post();
        $post->title = $request->title;
        //$post->content = $request->content;
        $post->content = $request->input('content');        
        $post->categoria = $request->categoria;
        $post->save();
 
       return redirect('/posts');
    }  
    
    // Metodo para mostar el Registros a Editar
    public function edit(string $post){
        $miID = $post;
        $post = Post::find($miID);
        return view("posts.edit",compact("post"));
    }

    // Metodo para Grabar los Cambios en el Registro
    public function update(Request $request, string $post){
        $miID = $post;

        $post =  Post::find($miID);

        $post->title = $request->title;
        $post->content = $request->input('content');        
        $post->categoria = $request->categoria;
        $post->save();
        return redirect("/posts/{$post->id}");
    }    
    public function destroy (string $post){
        
        $miID = $post;
        $post = Post::find($miID);
        $post->delete();
        return redirect('/posts'); 

    }

    // Metodo para mostrar el detalle de un registros
    public function show(string $post){
        // return "Aqui se mostrara el post {$post}";    
        
        // Crecuperandos el Valor que lleva por post y filtramos en el modelo
        $miID = $post;
        $post = Post::find($miID);

        // compact("post"); es igual a => ["post"=>$post] y se puede usar en la vista de la siguiente manera: $post
        // return view("posts.show",[ "post"=>$post]);
        return view("posts.show",compact("post"));

    }
}
