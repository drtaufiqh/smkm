<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Instansi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembimbingLapangan>
 */
class PembimbingLapanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $user->role = 'pemlap';
        $user->save();
        return [
            'id_user' => $user->id,
            'nama' => fake()->name,
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'nip_lama' => fake()->unique()->numerify('#############'),
            'nip_baru' => fake()->unique()->numerify('#############'),
            'golongan' => fake()->randomElement(['Ia', 'Ib', 'Ic', 'Id', 'IIa', 'IIb', 'IIc', 'IId', 'IIIa', 'IIIb', 'IIIc', 'IIId', 'IVa', 'IVb', 'IVc', 'IVd', 'IVe']),
            'jabatan' => fake()->text(10),
            'email' => fake()->unique()->safeEmail,
            'no_hp' => fake()->phoneNumber,
            'id_instansi' => fake()->numberBetween(1,10),
            'foto' => 'path/to/your/photo.jpg', // Ganti dengan path foto yang sesuai
        ];
    }
}
