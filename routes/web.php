<?php
// referencia a la Modelo Cliente
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomelayoutController;
use App\Models\Post;

// Route::get('/', function () {
//     return view('welcome');
// });
// Se ha cambiar la ruta de la pagina principal a un controlador, para ello se ha creado el controlador HomeController.php
Route::get('/', HomeController::class);
// La URL larga segeria : http://localhost/tallerlaravel/public/homelayout 
Route::get('/homelayout', HomelayoutController::class);

Route::get(uri:'/cliente/crear', action: function (){
    $cliente = new Cliente();
    $cliente->dni = '12345678';
    $cliente->apellido_paterno = 'Perez';
    $cliente->apellido_materno = 'Vasquez';
    $cliente->nombres = 'Juan';
    $cliente->email = 'juan@gmail.com';
    $cliente->fecha_nacimiento = '2000-01-01';
    $cliente->estado_civil = 'SOLTERO';
    $cliente->save();
    return response("Cliente Registrado Correctamente " . now()->toDateTimeString(), 200);
});


Route::get(uri:'/cliente/editar', action: function (){
    $cliente =  Cliente::find(id:1);
    $cliente->email = 'juanperes@gmail.com';
    $cliente->estado_civil = 'VIUDO';
    $cliente->save();
    return response("Cliente Actualizado Correctamente ". now()->toDateTimeString(), 200);
});


Route::get(uri:'/cliente/eliminar', action: function (){
    $cliente =  Cliente::find(id:1);
    $cliente->delete();
    return response("Cliente Eliminado Correctamente ". now()->toDateTimeString(), 200);
});

Route::get(uri:'/cliente/listar', action: function (){
    $clientes =  Cliente::all();
    foreach($clientes as $cliente){
        echo $cliente->nombres . " " . $cliente->apellido_paterno . " " . $cliente->apellido_materno. " " . $cliente->email . "<br>";
    }
    return response("Cliente Listado Correctamente ". now()->toDateTimeString(), 200);
    
});

// aqui tenemos tipos de peticiones GET, POST, PUT, DELETE, PATCH, OPTIONS
// GET: para obtener datos
// POST: para crear datos
// PUT: para actualizar datos
// DELETE: para eliminar datos
// PATCH: para actualizar parcialmente datos
// OPTIONS: para obtener información sobre los métodos HTTP soportados por el servidor

/*
Es importante definir el orden de las rutas, Se ejecuta de arriba hacia abajo, ya que si definimos una ruta con parámetros antes de una ruta sin parámetros, 
la ruta con parámetros se ejecutará primero y la ruta sin parámetros nunca se ejecutará. 
*/
/*
Route::get('/posts', function () {
    return "Aqui se mostrar todos los posts";
});
*/
// Se ha cambiar la ruta de la pagina principal a un controlador, para ello se ha creado el controlador PostController.php
//Route::get('/posts', [PostController::class, 'index']);
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Crea Registros
//Route::post('/posts', [PostController::class, 'store']);
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// HTML Frm Crear
// La URL larga segeria : http://localhost/tallerlaravel/public/posts/create
//Route::get('/posts/create', [PostController::class, 'create']);
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// HTML del Detalle del Registro
// La URL larga segeria : http://localhost/tallerlaravel/public/posts/50 con parametros
//Route::get('/posts/{post}', [PostController::class, 'show']);
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get("posts/{post}", function ($post) {    
//     return "Aqui se mostrara el post {$post}";
// });

// HTML de Editar
//Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Editar Registro
//Route::put('/posts/{post}', [PostController::class, 'update']);
//Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Eliminar Registro
//Route::delete('/posts/{post}', [PostController::class, 'destroy']);
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

/*
Vamos a reemplazar los 7 metodos por una soloa linea
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
*/
Route::Resource('posts',PostController::class);

/*
// La URL larga segeria : http://localhost/tallerlaravel/public/posts/50/tecnologia con parametros
Route::get("posts/{post}/{category}", function ($post, $category) {    
    return "Aqui se mostrara el post {$post} en la categoria {$category}";
});

// La URL larga segeria : http://localhost/tallerlaravel/public/posts2/50/ con parametros con/ Opciones
Route::get("posts2/{post}/{category?}", function ($post, $category=null) {  
    if($category==null){
        $category = "Sin Categoria";
    }
    return "Aqui se mostrara el post {$post} en la categoria {$category}";
});
*/
/*
// Usando Route Resource lo que crear las 7 rutas usando las conversion usando
Route::resource('posts',PostController::class)

D:\xampp\htdocs\tallerlaravel> php artisan route:list 
POST        _ignition/update-config ignition.updateConfig
GET|HEAD    posts .............. posts.index › PostController@index
POST        posts .............. posts.store › PostController@store
GET|HEAD    posts/create ....... posts.create › PostController@create
GET|HEAD    posts/{post} ....... posts.show › PostController@show
PUT|PATCH   posts/{post} ....... posts.update › PostController@update
DELETE      posts/{post} ....... posts.destroy › PostController@destroy
GET|HEAD    posts/{post} ....... posts.edit › PostController@edit

//para omitir un metodo que se use se puede usar
Route::resource('posts',PostController::class)->except(['destroy','show']);

D:\xampp\htdocs\tallerlaravel> php artisan route:list 
POST        _ignition/update-config ignition.updateConfig
GET|HEAD    posts .............. posts.index › PostController@index
POST        posts .............. posts.store › PostController@store
GET|HEAD    posts/create ....... posts.create › PostController@create
PUT|PATCH   posts/{post} ....... posts.update › PostController@update
GET|HEAD    posts/{post} ....... posts.edit › PostController@edit

// para ver las rutas con el comando : D:\xampp\htdocs\tallerlaravel> php artisan route:list --path=posts

si queremos cambiar el nombre de las URL y mantener las rutas se puede hacer
Route::resource('articulos',PostController::class)->name('posts')->parameters(['articulos','posts']));

queda asi :
POST        _ignition/update-config ignition.updateConfig
GET|HEAD    articulos .............. posts.index › PostController@index
POST        articulos .............. posts.store › PostController@store
GET|HEAD    articulos/create ....... posts.create › PostController@create
GET|HEAD    articulos/{post} ....... posts.show › PostController@show
PUT|PATCH   articulos/{post} ....... posts.update › PostController@update
DELETE      articulos/{post} ....... posts.destroy › PostController@destroy

*/

Route::get('prueba',  function () {
    // Crear un registro en la tabla posts

    // $post = new Post();
    // $post->title = "Titulo de prueba 3";
    // $post->content = "Contenido de prueba 3";
    // $post->categoria = "Categoria de prueba 3";
    // $post->save();
    //return $post;

    // Recuperar un registro de la tabla posts 
    //$post = Post ::find(1);
    //return $post;

    // // este filtro es equivalente a SELECT * FROM posts WHERE title = 'Titulo de prueba 2' LIMIT 1
    // $post = Post::where('title', 'Titulo de prueba 2')->first();
    // // Aqui se puede modificar el registro recuperado para actualizarlo, por ejemplo:
    // $post->categoria = "Desarrollo Web";
    // $post->save();
    //return $post;


    // recuperar todos los registros de la tabla posts    
    //$post = Post ::all();
    //return $post;

    // recuperar todos los registros de la tabla posts con un filtro, por ejemplo, todos los registros con id >= 2
    //$post = Post::where('id', '>=','2')->get();
    //return $post;

    // recuperar todos los registros de la tabla posts con un filtro, por ejemplo, todos los registros con id >= 2 y ordenados por id descendente    
    //$post = Post::where('id', '>=','2')->orderBy('id', 'desc')->get();    
    //return $post;    


    // recuperar todos los registros de la tabla posts con un filtro, por ejemplo, todos los registros con id >= 2 y solo mostrar los campos title, categoria e id   
    //$post = Post::where('id', '>=','2')->select('title','categoria','id')->get();    
    //return $post;

    //Eliminar un registro de la tabla posts
    //$post = Post ::find(1);
    //$post->delete();
    //return "Eliminardo correctamente  "  ;        

    // Probando que seguridad que se brindo al campo title en el modelo
    // $post = new Post();
    // $post->title = "Título DE prueBA 4";
    // $post->content = "Contenido de prueba 4";
    // $post->categoria = "Categoria de prueba 4";
    // $post->save();
    // return $post;

    //$post = Post ::find(4);
    //return $post;
});


Route::get('prueba2',  function () {
    $post = Post::find(1);
    //return $post->created_at->format('d-m-Y');
    //return $post->created_at->diffForHumans();    
    //return $post->published_at->format('d-m-Y');
    return $post;
});