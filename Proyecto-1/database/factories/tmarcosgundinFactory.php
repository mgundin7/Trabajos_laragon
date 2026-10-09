<?php

namespace Database\Factories;

use App\Models\tmarcosgundin;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<tmarcosgundin>
 */
class tmarcosgundinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
     $crcMap = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
 
     $number = fake()->numerify('########');
     $letter = $crcMap[$number % 23];
     $dni= $number . $letter;
 
     return [
            'nom'=>fake()->firstName(), //name()
            'dni'=>fake()->unique()->passthrough($dni),
            'tractament'=>fake()->lastName()  //name()           
        ]; 
 
    }
}
