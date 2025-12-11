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
        Schema::table('administradores', function (Blueprint $table) {
            //
            Schema::table('administradores', function (Blueprint $table) {
            // Aquí le decimos que elimine la columna
            $table->dropColumn('sede_id');
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administradores', function (Blueprint $table) {
            //
            Schema::table('administradores', function (Blueprint $table) {
            // Esto es por si necesitas revertir (puedes ajustar el tipo de dato)
            $table->unsignedBigInteger('sede_id')->nullable()->after('rol');
        });
        });
    }
};
