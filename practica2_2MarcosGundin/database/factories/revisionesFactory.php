<?php

namespace Database\Factories;

use App\Models\revisiones;
use App\Models\tpracticamarcos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<revisiones>
 */
class revisionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricula' => tpracticamarcos::inRandomOrder()->first()->plate,
            'fecha' => fake()->dateTimeBetween('1990-01-01', '2026-12-31')->format('Y-m-d'),
            'descripcion' => fake()->randomElement([
                [
                    'Cambio de aceite y filtro',
                    'Cambio de filtro de aire',
                    'Cambio de filtro de combustible',
                    'Cambio de pastillas de freno',
                    'Cambio de discos de freno',
                    'Revisión pre-ITV',
                    'ITV periódica',
                    'Cambio de neumáticos',
                    'Alineación de dirección',
                    'Cambio de batería',
                    'Cambio de escobillas',
                    'Revisión del aire acondicionado',
                    'Cambio de correa de distribución',
                    'Cambio de bujías',
                    'Cambio de amortiguadores',
                    'Cambio de líquido de frenos',
                    'Cambio de anticongelante',
                    'Diagnóstico electrónico',
                    'Reparación del alternador',
                    'Cambio de embrague',
                ]
            ]),
            'precio' => fake()->randomFloat(2, 100, 2500),
        ];
    }
}
