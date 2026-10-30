<?php

namespace Database\Factories;

use App\Models\Producte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producte>
 */
class ProducteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->words(2, true),
            'precio' => fake()->randomFloat(2, 5, 500),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
