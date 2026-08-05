<?php
// referencia a la Modelo Cliente
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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
 