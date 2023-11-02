<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KartuKendali>
 */
class KartuKendaliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_bimbingan' => fake()->numberBetween(1,10),
            'id_mhs' => fake()->numberBetween(1,10),
            'pokok_bahasan' => fake()->text,
            'diketahui' => fake()->boolean,
        ];
    }
}
