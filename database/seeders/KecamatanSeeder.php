<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $kecamatan = [
            ['kode' => '0101010', 'nama' => 'Kecamatan A', 'akronim' => 'KA', 'id_kabkota' => 1],
            ['kode' => '0101020', 'nama' => 'Kecamatan B', 'akronim' => 'KB', 'id_kabkota' => 1],
            ['kode' => '0201010', 'nama' => 'Kecamatan X', 'akronim' => 'KX', 'id_kabkota' => 2],
            ['kode' => '0201020', 'nama' => 'Kecamatan Y', 'akronim' => 'KY', 'id_kabkota' => 2],
            ['kode' => '0301010', 'nama' => 'Kecamatan C', 'akronim' => 'KC', 'id_kabkota' => 3],
            ['kode' => '0301020', 'nama' => 'Kecamatan D', 'akronim' => 'KD', 'id_kabkota' => 3],
            ['kode' => '0401010', 'nama' => 'Kecamatan Z', 'akronim' => 'KZ', 'id_kabkota' => 4],
            ['kode' => '0401020', 'nama' => 'Kecamatan W', 'akronim' => 'KW', 'id_kabkota' => 4],
            ['kode' => '0501010', 'nama' => 'Kecamatan E', 'akronim' => 'KE', 'id_kabkota' => 5],
            ['kode' => '0501020', 'nama' => 'Kecamatan F', 'akronim' => 'KF', 'id_kabkota' => 5],
        ];

        foreach ($kecamatan as $data) {
            DB::table('kecamatans')->insert($data);
        }
    }
}
