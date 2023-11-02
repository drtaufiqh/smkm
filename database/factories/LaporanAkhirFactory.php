<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaporanAkhir>
 */
class LaporanAkhirFactory extends Factory
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
            'laporan_awal' => 'path/to/laporan_awal.pdf', // Ganti dengan path laporan awal yang sesuai
            'komentar_pemlap' => fake()->text,
            'approval_awal_pemlap' => fake()->boolean,
            'approval_awal_dospem' => fake()->boolean,
            'laporan_final' => 'path/to/laporan_final.pdf', // Ganti dengan path laporan final yang sesuai
            'approval_akhir_pemlap' => fake()->boolean,
            'approval_akhir_dospem' => fake()->boolean,
            'approval_akhir_kampus' => fake()->boolean,
            'nilai_akhir_pemlap' => fake()->randomFloat(2, 0, 100),
            'nilai_akhir_dospem' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
