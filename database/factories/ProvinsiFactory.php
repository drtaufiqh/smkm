<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provinsi>
 */
class ProvinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $provinsi = [
            'Aceh' => 'ACEH',
            'Sumatera Utara' => 'SUMUT',
            'Sumatera Barat' => 'SUMBAR',
            'Riau' => 'RIAU',
            'Jambi' => 'JAMBI',
            'Sumatera Selatan' => 'SUMSEL',
            'Lampung' => 'LAMPUNG',
            'Kepulauan Bangka Belitung' => 'BABEL',
            'Kepulauan Riau' => 'KEPRI',
            'DKI Jakarta' => 'DKI',
            'Jawa Barat' => 'JABAR',
            'Jawa Tengah' => 'JATENG',
            'DI Yogyakarta' => 'DIY',
            'Jawa Timur' => 'JATIM',
            'Banten' => 'BANTEN',
            'Bali' => 'BALI',
            'Nusa Tenggara Barat' => 'NTB',
            'Nusa Tenggara Timur' => 'NTT',
            'Kalimantan Barat' => 'KALBAR',
            'Kalimantan Tengah' => 'KALTENG',
            'Kalimantan Selatan' => 'KALSEL',
            'Kalimantan Timur' => 'KALTIM',
            'Kalimantan Utara' => 'KALUT',
            'Sulawesi Utara' => 'SULUT',
            'Sulawesi Tengah' => 'SULTENG',
            'Sulawesi Selatan' => 'SULSEL',
            'Sulawesi Tenggara' => 'SULTRA',
            'Gorontalo' => 'GORONTALO',
            'Maluku' => 'MALUKU',
            'Maluku Utara' => 'MALUT',
            'Papua Barat' => 'PAPBAR',
            'Papua' => 'PAPUA',
        ];
    
        $namaProvinsi = fake()->randomElement(array_keys($provinsi));
        $akronimProvinsi = $provinsi[$namaProvinsi];
    
        return [
            'kode' => fake()->regexify('[A-Z0-9]{4}'),
            'nama' => $namaProvinsi,
            'akronim' => $akronimProvinsi
        ];
    }
}
