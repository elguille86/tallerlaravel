<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes; // manear la eliminación lógica de los registros o TRAIT
    protected $table = 'cliente';

    // protected $primaryKey = 'id_cliente';

    // protected $connection = 'mysql_grp';
    // protected $keyType = 'string';
    
    // protected $incrementing = false;
    // // No es un valor incrementable

    // public $timestamps = false; // si no tiene las columnas created_at y updated_at, se pone en false

    

    
}
