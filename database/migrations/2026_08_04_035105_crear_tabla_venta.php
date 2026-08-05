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
        Schema::create('venta', function (Blueprint $table) {
            // Creando la tabla Ventas
            $table->id();
            $table->date(column:'fecha');
            $table->decimal(column:'total', total: 11, places: 2);
            $table->string(column:'serie', length: 5);
            $table->string(column:'correlativo', length: 5);            
            $table->unsignedBigInteger(column:'Cliente_id');
            // Crear la llame forenea para la tabla cliente
            $table->foreign(columns:'Cliente_id')->on(table:'cliente')->references(columns:'id')->onDelete(action:'RESTRICT');
            $table->timestamps();
            $table->softDeletes();
            
            ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
