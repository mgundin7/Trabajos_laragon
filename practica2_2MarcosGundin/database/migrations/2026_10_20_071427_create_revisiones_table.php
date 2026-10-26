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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id('id_revisiones');
            $table->string('matricula', 7);
            $table->date('fecha');
            $table->string('descripcion');
            $table->decimal('precio', 9, 2)->default(0);

            $table->foreign('matricula')->references('matricula')->on('tpracticamarcos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};