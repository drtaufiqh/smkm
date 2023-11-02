<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalBimbingan>
 */
class JadwalBimbinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lokasi = fake()->randomElement(['offline', 'online']);
        $link = $lokasi === 'online' ? 'https://zoom.us/meeting/your-meeting-id' : '-';

        return [
            'tanggal' => fake()->date,
            'jam' => fake()->time('H:i'),
            'lokasi' => $lokasi,
            'link' => $link,
            'id_dosen_pembimbing' => fake()->numberBetween(1,10),
        ];
    }
}
