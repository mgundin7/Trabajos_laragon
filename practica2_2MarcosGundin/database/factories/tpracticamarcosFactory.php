<?php

namespace Database\Factories;

use App\Models\tpracticamarcos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<tpracticamarcos>
 */
class tpracticamarcosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Letras permitidas en las matrículas españolas
        $letras = 'BCDFGHJKLMNPRSTVWXYZ';

        // Generar matrícula: 4 números + 3 letras
        $matricula =
            fake()->unique()->numerify('####') .
            $letras[random_int(0, strlen($letras) - 1)] .
            $letras[random_int(0, strlen($letras) - 1)] .
            $letras[random_int(0, strlen($letras) - 1)];

        return [
            'matricula' => $matricula,

            'marca' => fake()->randomElement([
                'BMW',
                'Audi',
                'Mercedes',
                'Volkswagen',
                'Toyota',
                'Ford',
                'Seat',
                'Renault',
                'Peugeot',
                'Honda'
            ]),

            'modelo' => fake()->randomElement([
                'Serie 3',
                'A4',
                'Clase C',
                'Golf',
                'Corolla',
                'Focus',
                'Leon',
                'Clio',
                '308',
                'Civic'
            ]),
            'año' => fake()->numberBetween(1990, (int) date('Y'))
        ];
    }
}