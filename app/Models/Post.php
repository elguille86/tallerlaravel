<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // que es HasFactory? es un TRAIT que permite crear fábricas para el modelo, es decir, permite crear registros de prueba en la base de datos
    protected $table = 'posts';

    // los modelos deber ser el nombre de la tabla en singular y con la primera letra en mayúscula, 
    //por ejemplo, si la tabla se llama posts, el modelo se llamará Post, 
    //si la tabla se llama clientes, el modelo se llamará Cliente, etc.

    // USANDO MUTADORES Y ACCESORES
    // un mutador es un método que se ejecuta cuando se asigna un valor a un atributo del modelo,
    //GET es Accesor Modifica  cuando se accede a dato
    //SET es Mutador antes de grabar
    protected function title() : Attribute
    {
        return  Attribute::make(
            get: fn ($value) => ucfirst($value), // ucfirst() convierte la primera letra de una cadena en mayúscula
            set: fn ($value) => strtolower($value), // strtolower() convierte una cadena en minúscula

            //set: function($value) {return strtolower($value);}
        );
    }

    // para eloquent todos los datos son de tipo string
    protected function casts(): array{
        return [
            'published_at'=>'datetime',
            'is_active'=>'boolean',
        ];
    } 
   


}
