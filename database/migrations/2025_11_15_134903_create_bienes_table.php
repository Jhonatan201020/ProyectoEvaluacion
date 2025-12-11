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
        Schema::create('bienes', function (Blueprint $table) {
            $table->id('id_bien');
            $table->string('nombre_bien');
            $table->string('codigo_patrimonial')->unique()->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->string('orden_compra');
            $table->enum('tipo', ['informatico', 'mobiliario', 'movilidad']); // 'informatico', 'mobiliario', 'movilidad'
            $table->enum('estado', ['bueno', 'regular', 'mantenimiento', 'malo', 'baja'])->default('bueno');

            // Campos para INFORMÁTICOS
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('numero_serie', 100)->nullable();
            $table->string('procesador', 100)->nullable();
            
            // Campos para MOBILIARIOS
            $table->string('color', 50)->nullable();
            $table->string('dimensiones', 100)->nullable();
            
            // Campos para MOVILIDADES
            $table->string('placa', 20)->nullable();
            $table->string('numero_motor', 100)->nullable();
            $table->string('chasis', 40)->nullable();
            $table->integer('año_fabricacion')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('tipo');
            $table->index('estado');
            $table->index('codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes');
    }
};
