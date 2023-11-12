<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instansi>
 */
class InstansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $isProv = fake()->boolean;

        $nama = 'BPS ' . ($isProv ? fake()->state : fake()->city);
        $user->role = ($isProv ? 'prov' : 'instansi');
        $user->save();

        return [
            'id_user' => $user->id,
            'nama' => $nama,
            'id_kecamatan' => fake()->numberBetween(1,10),
            'alamat_lengkap' => fake()->text,
            'is_prov' => $isProv,
        ];
    }
}
