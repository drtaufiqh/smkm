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
            ['nama' => 'Sumatera Barat', 'akronim' => 'SUMBAR', 'kode' => '13'],
            ['nama' => 'Riau', 'akronim' => 'RIAU', 'kode' => '14'],
            ['nama' => 'Jambi', 'akronim' => 'JAMBI', 'kode' => '15'],
            ['nama' => 'Sumatera Selatan', 'akronim' => 'SUMSEL', 'kode' => '16'],
            ['nama' => 'Bengkulu', 'akronim' => 'BENGKULU', 'kode' => '17'],
            ['nama' => 'Lampung', 'akronim' => 'LAMPUNG', 'kode' => '18'],
            ['nama' => 'Kepulauan Bangka Belitung', 'akronim' => 'KEPBABEL', 'kode' => '19'],
            ['nama' => 'Kepulauan Riau', 'akronim' => 'KEPRI', 'kode' => '21'],
            ['nama' => 'DKI Jakarta', 'akronim' => 'DKIJKT', 'kode' => '31'],
            ['nama' => 'Jawa Barat', 'akronim' => 'JABAR', 'kode' => '32'],
            ['nama' => 'Jawa Barat', 'akronim' => 'JABAR', 'kode' => '32'],
            ['nama' => 'Jawa Tengah', 'akronim' => 'JATENG', 'kode' => '33'],
            ['nama' => 'Daerah Istimewa Yogyakarta', 'akronim' => 'DIY', 'kode' => '34'],
            ['nama' => 'Jawa Timur', 'akronim' => 'JATIM', 'kode' => '35'],
            ['nama' => 'Banten', 'akronim' => 'BANTEN', 'kode' => '36'],
            ['nama' => 'Bali', 'akronim' => 'BALI', 'kode' => '51'],
            ['nama' => 'Nusa Tenggara Barat', 'akronim' => 'NTB', 'kode' => '52'],
            ['nama' => 'Nusa Tenggara Timur', 'akronim' => 'NTT', 'kode' => '53'],
            ['nama' => 'Kalimantan Barat', 'akronim' => 'KALBAR', 'kode' => '61'],
            ['nama' => 'Kalimantan Tengah', 'akronim' => 'KALTENG', 'kode' => '62'],
            ['nama' => 'Kalimantan Selatan', 'akronim' => 'KALSEL', 'kode' => '63'],
            ['nama' => 'Kalimantan Timur', 'akronim' => 'KALTIM', 'kode' => '64'],
            ['nama' => 'Kalimantan Utara', 'akronim' => 'KALUT', 'kode' => '65'],
            ['nama' => 'Sulawesi Utara', 'akronim' => 'SULUT', 'kode' => '71'],
            ['nama' => 'Sulawesi Tengah', 'akronim' => 'SULTENG', 'kode' => '72'],
            ['nama' => 'Sulawesi Selatan', 'akronim' => 'SULSEL', 'kode' => '73'],
            ['nama' => 'Sulawesi Tenggara', 'akronim' => 'SULTRA', 'kode' => '74'],
            ['nama' => 'Gorontalo', 'akronim' => 'GORONTALO', 'kode' => '75'],
            ['nama' => 'Sulawesi Barat', 'akronim' => 'SULBAR', 'kode' => '76'],
            ['nama' => 'Maluku', 'akronim' => 'MALUKU', 'kode' => '81'],
            ['nama' => 'Maluku Utara', 'akronim' => 'MALUT', 'kode' => '82'],
            ['nama' => 'Papua', 'akronim' => 'PAPUA', 'kode' => '91'],
            ['nama' => 'Papua Barat', 'akronim' => 'PABAR', 'kode' => '92'],
            ['nama' => 'Papua Barat Daya', 'akronim' => 'PBD', 'kode' => '92'],
            ['nama' => 'Papua Selatan', 'akronim' => 'PASEL', 'kode' => '93'],
            ['nama' => 'Papua Tengah', 'akronim' => 'PAPTENG', 'kode' => '94'],
            ['nama' => 'Papua Pegunungan', 'akronim' => 'PAPEG', 'kode' => '95']
        ];
        

        foreach ($provinsi as $data) {
            DB::table('provinsis')->insert($data);
        }
    }
}
