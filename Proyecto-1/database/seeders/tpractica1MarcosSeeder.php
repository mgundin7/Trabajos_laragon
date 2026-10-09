<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tmarcosgundin;

class tpractica1MarcosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tmarcosgundin::truncate(); //elimina les dades de la taula
 
        // for($i=0;$i<50;$i++)
        // {
        // tmarcosgundin::create([
        //     'nom' => "nom$i",
        //     'dni' => "$i",
        //     'tractament' => "tractament$i"
        // ]);
       tmarcosgundin::factory(50)->create();
        }
    }

