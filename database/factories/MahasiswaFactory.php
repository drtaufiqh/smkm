<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $user->role = 'mhs';
        $user->save();
        return [
            'id_user'=> $user->id,
            'nama' => fake()->name,
            'nim' => fake()->unique()->numerify('#########'),
            'email' => fake()->unique()->safeEmail,
            'no_hp' => fake()->phoneNumber,
            'foto' => '/storage/assets/img//1701534412_Foto 1x1.png', // Ganti dengan path foto yang sesuai
            'kelas' => fake()->randomElement(['3SD1', '3SD2', '3SD3', '3SI1', '3SI2', '3SI3', '3SK1', '3SK2', '3SK3', '3SE1', '3SE2', '3SE3']),
            'jenis_kelamin' => fake()->randomElement(['laki-laki', 'perempuan']),
            'alamat_1' => fake()->address,
            'id_kecamatan_alamat_1' => fake()->numberBetween(1,10),
            'alamat_2' => fake()->address,
            'id_kecamatan_alamat_2' => fake()->numberBetween(1,10),
            'bank' => fake()->word,
            'an_bank' => fake()->name,
            'no_rek' => fake()->numerify('##############'),
            'id_dosen_pembimbing' => fake()->numberBetween(1,10),
            'id_pembimbing_lapangan' => fake()->numberBetween(1,10),
            // 'id_instansi' => fake()->numberBetween(1,10),
        ];
    }
}
