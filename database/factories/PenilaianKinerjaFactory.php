<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenilaianKinerja>
 */
class PenilaianKinerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_mhs' => fake()->numberBetween(1,10),
            'nilai_k1' => fake()->randomFloat(2, 0, 100),
            'nilai_k2' => fake()->randomFloat(2, 0, 100),
            'nilai_k3' => fake()->randomFloat(2, 0, 100),
            'nilai_k4' => fake()->randomFloat(2, 0, 100),
            'nilai_k5' => fake()->randomFloat(2, 0, 100),
            'nilai_k6' => fake()->randomFloat(2, 0, 100),
            'nilai_k7' => fake()->randomFloat(2, 0, 100),
            'nilai_k8' => fake()->randomFloat(2, 0, 100),
            'nilai_k9' => fake()->randomFloat(2, 0, 100),
            'nilai_k10' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
