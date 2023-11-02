<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penilaian>
 */
class PenilaianFactory extends Factory
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
            'nilai_laporan_dospem' => fake()->randomFloat(2, 0, 100),
            'nilai_laporan_pemlap' => fake()->randomFloat(2, 0, 100),
            'nilai_kinerja' => fake()->randomFloat(2, 0, 100),
            'nilai_bimbingan' => fake()->randomFloat(2, 0, 100),
            'nilai_akhir' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
