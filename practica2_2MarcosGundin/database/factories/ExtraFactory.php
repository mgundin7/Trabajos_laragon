<?php

namespace Database\Factories;

use App\Models\Extra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Extra>
 */
class ExtraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->randomElement([
                'Aire acondicionado', 'GPS', 'Techo solar', 'Cámara trasera',
                'Asientos de cuero', 'Sensores de aparcamiento',
                'Llantas de aleación', 'Control de crucero',
            ]),
            'precio' => fake()->randomFloat(2, 100, 2500),
        ];
    }
}
