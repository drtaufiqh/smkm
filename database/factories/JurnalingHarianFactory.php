<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JurnalingHarian>
 */
class JurnalingHarianFactory extends Factory
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
            'tanggal' => fake()->date,
            'deskripsi_pekerjaan' => fake()->text,
            'kuantitas_volume' => fake()->numberBetween(1, 100),
            'kuantitas_satuan' => fake()->randomElement(['Batch', 'Transaksi', 'Unit', 'M2', 'M3']), // Anda dapat menyesuaikan satuan sesuai kebutuhan
            'durasi_waktu' => fake()->randomElement(['1 jam', '2 jam', '3 jam']),
            'pemberi_tugas' => fake()->name,
            'status_penyelesaian' => fake()->randomFloat(2, 0, 100),
            'status_final_mhs' => fake()->boolean,
            'status_final_penilai' => fake()->boolean,
        ];
    }
}
