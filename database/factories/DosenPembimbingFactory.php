<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DosenPembimbing>
 */
class DosenPembimbingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create(); // Buat entri User terlebih dahulu
        $user->role = 'dospem';
        $user->save();

        return [
            'id_user' => $user->id,
            'nama' => fake()->name,
            'nip_lama' => fake()->unique()->numerify('#########'), // Contoh: 123456
            'nip_baru' => fake()->unique()->numerify('##################'), // Contoh: 123456
            'email' => fake()->unique()->safeEmail,
            'no_hp' => fake()->phoneNumber,
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'foto' => '/assets/img/BPS.jpg', // URL gambar acak
        ];

    }
}
