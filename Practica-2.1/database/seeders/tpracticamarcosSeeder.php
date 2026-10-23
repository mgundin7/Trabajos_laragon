<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tpracticamarcos;

class tpracticamarcosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tpracticamarcos::truncate(); //elimina les dades de la taula
 
        // for($i=0;$i<50;$i++)
        // {
        // tpracticamarcos::create([
        //     'matricula' => "$i",
        //     'marca' => "marca$i",
        //     'modelo' => "modelo$i"
        // ]);
        tpracticamarcos::factory(50)->create();
    }
}

