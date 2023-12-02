<?php

namespace Database\Factories;

use App\Models\KabKota;
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
        $id_kab_kota = fake()->numberBetween(1,10);

        return [
            'id_user' => $user->id,
            'nama' => $nama,
            'id_kecamatan' => fake()->numberBetween(1,10),
            'id_kab_kota' => $id_kab_kota,
            'kode_kabkota' => KabKota::where('id', fake()->numberBetween(1,10))->first()->kode,
            'alamat_lengkap' => fake()->text,
            'is_prov' => $isProv,
            'foto' => '/storage/assets/img//1701535520_BPS.jpg'
        ];
    }
}
