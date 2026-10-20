<?php

namespace Database\Seeders;

use App\Models\revisiones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class revisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        revisiones::query()->delete();


        revisiones::factory(50)->create();
    }
}
