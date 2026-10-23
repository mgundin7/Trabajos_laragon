<?php

namespace Database\Seeders;

use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Extra::query()->delete();
        // $extras = Extra::factory(8)->create();

        // $matriculas = DB::table('tpracticamarcos')->pluck('matricula');

        // foreach ($extras as $extra) {
        //     foreach ($matriculas->take(3) as $matricula) {
        //         DB::table('coche_extras')->insert([
        //             'matricula' => $matricula,
        //             'id_extra'  => $extra->id_extra,
        //         ]);
        // }
        // }
        Extra::factory(50)->create();
    }
}

