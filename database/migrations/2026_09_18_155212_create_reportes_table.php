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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('unidad_id')->constrained('unidades');
            $table->foreignId('colonia_id')->constrained('colonias');
            $table->string('direccion', 255);
            $table->integer('litros_entregados')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('estatus', 30)->default('completado');
            $table->dateTime('fecha_reporte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
