<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('numero_unidad', 50)->unique();
            $table->string('placas', 20)->nullable();
            $table->integer('capacidad_litros')->nullable();
            $table->string('estatus', 20)->default('activa');
            $table->timestamps();
        });

        // Conectar las llaves foráneas de users ahora que roles y unidades ya existen
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rol_id']);
            $table->dropForeign(['unidad_id']);
        });

        Schema::dropIfExists('unidades');
    }
};
