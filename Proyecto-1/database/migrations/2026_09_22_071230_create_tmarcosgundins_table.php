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
        Schema::create('tmarcosgundins', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
           //$table->integer('id')->primary()->autoIncrement(); //primary key a nivell de columna
           $table->string('nom')->nullable();
           $table->string('dni',length:9)->primary();  
           $table->string('tractament')->default("Mr/Ms"); //o li fiquem un valor predeterminat  
           // $table->primary(['id']);  //primary key a nivell de taula
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmarcosgundins');
    }
};
