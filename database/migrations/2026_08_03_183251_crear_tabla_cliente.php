<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Codigo para crear una tabla
        // Codigo para Modificar una tabla
        Schema::create('cliente', function (Blueprint $table) {
            // crear las columnas en su tabla            
            $table->unsignedBigInteger(column:'id')->autoIncrement();
            $table->primary(columns:['id']);
            $table->string(column:'dni', length: 8);
            $table->string(column:'apellido_paterno', length: 80);
            $table->string(column:'apellido_materno', length: 80);
            $table->string(column:'nombres', length: 60);
            $table->string(column:'email', length: 120);
            $table->date(column:'fecha_nacimiento')->nullable();
            $table->unsignedBigInteger(column:'codigo_postal')->nullable();
            $table->enum(column:'estado_civil', allowed: ['SOLTERO', 'CASADO', 'DIVORCIADO', 'VIUDO'])->nullable();            
            // $table->id();
            //es una autoria simple
            $table->timestamps(); // created_at, updated_at
            //created_at -> fecha de creacion del registro
            //updated_at -> fecha de actualizacion del registro 
            $table->softDeletes(); // deleted_at -> permite eliminar registros de manera logica  ( Automatica )
            //select * from cliente where deleted_at is null ( Automatica )

        
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // para revertir una migracion    
        // para Eliminar una tabla
        Schema::dropIfExists('cliente');
    }
};
