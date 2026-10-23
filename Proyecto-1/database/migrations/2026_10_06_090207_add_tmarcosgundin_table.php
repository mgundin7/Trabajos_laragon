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
         Schema::table('tmarcosgundins', function (Blueprint $table) {           
            $table->integer('edad')->nullable();  //així potser null i no cal omplir   
 
            //$table->string('tractament')->default("Mr/Ms"); //o li fiquem un valor predeterminat       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
