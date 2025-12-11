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
        Schema::create('administrador_sede', function (Blueprint $table) {   

            $table->unsignedBigInteger('id_administrador');
            $table->unsignedBigInteger('id_sede');
            $table->foreign('id_administrador')->references('id_administrador')->on('administradores');
            $table->foreign('id_sede')->references('id_sede')->on('sedes');

            // Definir la clave primaria compuesta
            $table->primary(['id_administrador', 'id_sede']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador_sede');
    }
};
