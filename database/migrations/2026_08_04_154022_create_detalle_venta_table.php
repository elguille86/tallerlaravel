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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->decimal(column:'name', total: 11, places: 2);
            $table->decimal(column:'cantidad', total:11, places: 2);
            $table->string(column:'producto', length: 100);
            $table->unsignedBigInteger(column:'venta_id');
            $table->foreign(columns:'venta_id')->on(table:'venta')->references(columns:'id')->onDelete(action:'RESTRICT');            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
