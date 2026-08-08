<?php
// referencia a la Modelo Cliente
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomelayoutController;

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
Route::get('/posts', [PostController::class, 'index']);

// La URL larga segeria : http://localhost/tallerlaravel/public/posts/create
Route::get('/posts/create', [PostController::class, 'create']);
//Route::get("posts/create", function () {    
//    return "Aqui se mostrara un formulario para crear un post";
//});
// La URL larga segeria : http://localhost/tallerlaravel/public/posts/50 con parametros
Route::get('/posts/{post}', [PostController::class, 'show']);
// Route::get("posts/{post}", function ($post) {    
//     return "Aqui se mostrara el post {$post}";
// });
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