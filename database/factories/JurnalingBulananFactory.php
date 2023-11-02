<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JurnalingBulanan>
 */
class JurnalingBulananFactory extends Factory
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
            'id_penilai' => fake()->numberBetween(1,10),
            'periode' => fake()->numberBetween(1, 12),
            'uraian_kegiatan' => fake()->text,
            'satuan' => fake()->word,
            'kuantitas_target' => fake()->numberBetween(1, 100),
            'kuantitas_realisasi' => fake()->numberBetween(1, 100),
            'tingkat_kuantitas' => fake()->randomFloat(2, 0, 100),
            'tingkat_kualitas' => fake()->randomFloat(2, 0, 100),
            'keterangan' => fake()->text,
            'status_final_mhs' => fake()->boolean,
            'status_final_penilai' => fake()->boolean,
        ];
    }
}
