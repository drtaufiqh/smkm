<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $kabkota = [
            ['kode' => '1101', 'nama' => 'Kabupaten Aceh Besar', 'akronim' => 'AB', 'id_prov' => 1],
            ['kode' => '1102', 'nama' => 'Kabupaten Aceh Jaya', 'akronim' => 'AJ', 'id_prov' => 1],
            ['kode' => '1201', 'nama' => 'Kota Medan', 'akronim' => 'MDN', 'id_prov' => 2],
            ['kode' => '1202', 'nama' => 'Kabupaten Deli Serdang', 'akronim' => 'DS', 'id_prov' => 2],
            // Lanjutkan dengan daftar kabupaten dan kota lainnya
            ['kode' => '3301', 'nama' => 'Kabupaten Cilacap', 'akronim' => 'CIL', 'id_prov' => 19],
            ['kode' => '3302', 'nama' => 'Kabupaten Banyumas', 'akronim' => 'BAN', 'id_prov' => 19],
            ['kode' => '3303', 'nama' => 'Kabupaten Purbalingga', 'akronim' => 'PUR', 'id_prov' => 19],
            ['kode' => '3304', 'nama' => 'Kabupaten Banjarnegara', 'akronim' => 'BANJAR', 'id_prov' => 19],
            ['kode' => '3305', 'nama' => 'Kabupaten Kebumen', 'akronim' => 'KEBUMEN', 'id_prov' => 19],
            ['kode' => '3306', 'nama' => 'Kabupaten Purworejo', 'akronim' => 'PURWOREJO', 'id_prov' => 19],
            ['kode' => '3311', 'nama' => 'Kabupaten Wonosobo', 'akronim' => 'WONOSOBO', 'id_prov' => 19],
            ['kode' => '3312', 'nama' => 'Kabupaten Magelang', 'akronim' => 'MAGELANG', 'id_prov' => 19],
            ['kode' => '3313', 'nama' => 'Kabupaten Boyolali', 'akronim' => 'BOYOLALI', 'id_prov' => 19],
            ['kode' => '3314', 'nama' => 'Kabupaten Klaten', 'akronim' => 'KLATEN', 'id_prov' => 19],
            // Lanjutkan dengan daftar kabupaten dan kota lainnya di Jawa Tengah
        ];

        foreach ($kabkota as $data) {
            DB::table('kab_kotas')->insert($data);
        }
    }
}
