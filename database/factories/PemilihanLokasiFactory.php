<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemilihanLokasi>
 */
class PemilihanLokasiFactory extends Factory
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
            'id_pilihan_1' => fake()->numberBetween(1,10),
            'id_pilihan_2' => fake()->numberBetween(1,10),
            'alasan_pilihan_1' => fake()->text,
            'alasan_pilihan_2' => fake()->text,
            'id_instansi_ajuan' => fake()->numberBetween(1,10),
            'id_instansi_banding' => fake()->numberBetween(1,10),
            'alasan_banding' => fake()->text,
            'id_instansi' => fake()->numberBetween(1,10),
        ];
    }
}
