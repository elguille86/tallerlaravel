<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // que es HasFactory? es un TRAIT que permite crear fábricas para el modelo, es decir, permite crear registros de prueba en la base de datos
    protected $table = 'posts';

    // los modelos deber ser el nombre de la tabla en singular y con la primera letra en mayúscula, 
    //por ejemplo, si la tabla se llama posts, el modelo se llamará Post, 
    //si la tabla se llama clientes, el modelo se llamará Cliente, etc.
}
