<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        // Usuario admin creado a mano
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'rol'      => 'admin',
        ]);

        // Usuarios falsos (rol 'usuari' por defecto)
        User::factory(10)->create();
    }
}