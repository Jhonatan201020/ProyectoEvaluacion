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
        Schema::create('bienes_movimiento', function (Blueprint $table) {
            $table->id('id_bien_movi');
            // Llave foránea a bienes
            $table->string('id_bien');
            $table->string('id_trabajador');            
            $table->timestamp('fecha_movimiento'); // timestampz
            $table->string('ubicacion_anterior');
            $table->string('ubicacion_nueva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes_movimiento');
    }
};
