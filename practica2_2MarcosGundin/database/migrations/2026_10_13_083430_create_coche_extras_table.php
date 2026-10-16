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
        Schema::create('coche_extras', function (Blueprint $table) {
            $table->string('matricula', 7);
            $table->unsignedInteger('id_extra');

            // La clave primaria son las dos columnas juntas
            $table->primary(['matricula', 'id_extra']);

            // Integridad referencial: si se borra un coche o un extra, se borra la relación
            $table->foreign('matricula')->references('matricula')->on('tpracticamarcos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_extra')->references('id_extra')->on('extras')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coche_extras');
    }
};
