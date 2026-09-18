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
        Schema::create('reporte_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporte_id')->constrained('reportes');
            $table->string('ruta_archivo', 255);
            $table->integer('peso_kb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_imagenes');
    }
};
