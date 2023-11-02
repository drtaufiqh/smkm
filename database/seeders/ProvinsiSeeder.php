<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $provinsi = [
            ['nama' => 'Nanggroe Aceh Darussalam', 'akronim' => 'NAD', 'kode' => '11'],
            ['nama' => 'Sumatera Utara', 'akronim' => 'SUMUT', 'kode' => '12'],
            ['nama' => 'Sumatera Selatan', 'akronim' => 'SUMSEL', 'kode' => '13'],
            ['nama' => 'Sumatera Barat', 'akronim' => 'SUMBAR', 'kode' => '14'],
            ['nama' => 'Bengkulu', 'akronim' => 'BENGKULU', 'kode' => '15'],
            ['nama' => 'Riau', 'akronim' => 'RIAU', 'kode' => '16'],
            ['nama' => 'Kepulauan Riau', 'akronim' => 'KEPRI', 'kode' => '21'],
            ['nama' => 'Jambi', 'akronim' => 'JAMBI', 'kode' => '15'],
            ['nama' => 'Lampung', 'akronim' => 'LAMPUNG', 'kode' => '17'],
            ['nama' => 'Bangka Belitung', 'akronim' => 'BABEL', 'kode' => '19'],
            ['nama' => 'Kalimantan Barat', 'akronim' => 'KALBAR', 'kode' => '61'],
            ['nama' => 'Kalimantan Timur', 'akronim' => 'KALTIM', 'kode' => '64'],
            ['nama' => 'Kalimantan Selatan', 'akronim' => 'KALSEL', 'kode' => '63'],
            ['nama' => 'Kalimantan Tengah', 'akronim' => 'KALTENG', 'kode' => '62'],
            ['nama' => 'Kalimantan Utara', 'akronim' => 'KALUT', 'kode' => '65'],
            ['nama' => 'Banten', 'akronim' => 'BANTEN', 'kode' => '36'],
            ['nama' => 'DKI Jakarta', 'akronim' => 'DKI', 'kode' => '31'],
            ['nama' => 'Jawa Barat', 'akronim' => 'JABAR', 'kode' => '32'],
            ['nama' => 'Jawa Tengah', 'akronim' => 'JATENG', 'kode' => '33'],
            ['nama' => 'Daerah Istimewa Yogyakarta', 'akronim' => 'DIY', 'kode' => '34'],
            ['nama' => 'Jawa Timur', 'akronim' => 'JATIM', 'kode' => '35'],
            ['nama' => 'Bali', 'akronim' => 'BALI', 'kode' => '51'],
            ['nama' => 'Nusa Tenggara Timur', 'akronim' => 'NTT', 'kode' => '53'],
            ['nama' => 'Nusa Tenggara Barat', 'akronim' => 'NTB', 'kode' => '52'],
            ['nama' => 'Gorontalo', 'akronim' => 'GORONTALO', 'kode' => '75'],
            ['nama' => 'Sulawesi Barat', 'akronim' => 'SULBAR', 'kode' => '76'],
            ['nama' => 'Sulawesi Tengah', 'akronim' => 'SULTENG', 'kode' => '72'],
            ['nama' => 'Sulawesi Utara', 'akronim' => 'SULUT', 'kode' => '71'],
            ['nama' => 'Sulawesi Tenggara', 'akronim' => 'SULTRA', 'kode' => '74'],
            ['nama' => 'Sulawesi Selatan', 'akronim' => 'SULSEL', 'kode' => '73'],
            ['nama' => 'Maluku Utara', 'akronim' => 'MALUT', 'kode' => '82'],
            ['nama' => 'Maluku', 'akronim' => 'MALUKU', 'kode' => '81'],
            ['nama' => 'Papua Barat', 'akronim' => 'PAPBAR', 'kode' => '91'],
            ['nama' => 'Papua', 'akronim' => 'PAPUA', 'kode' => '92'],
            ['nama' => 'Papua Tengah', 'akronim' => 'PAPUA', 'kode' => '93'],
            ['nama' => 'Papua Pegunungan', 'akronim' => 'PAPUA', 'kode' => '94'],
            ['nama' => 'Papua Selatan', 'akronim' => 'PAPUA', 'kode' => '95'],
            ['nama' => 'Papua Barat Daya', 'akronim' => 'PAPUA', 'kode' => '96']
        ];

        foreach ($provinsi as $data) {
            DB::table('provinsis')->insert($data);
        }
    }
}
