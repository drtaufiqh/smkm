<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\DosenPembimbing;
use \App\Models\Instansi;
use App\Models\JadwalBimbingan;
use App\Models\JurnalingBulanan;
use App\Models\JurnalingHarian;
use App\Models\KartuKendali;
use App\Models\LaporanAkhir;
use App\Models\PembimbingLapangan;
use App\Models\Mahasiswa;
use App\Models\PemilihanLokasi;
use App\Models\Penilaian;
use App\Models\PenilaianBimbingan;
use App\Models\PenilaianKinerja;
use App\Models\PenilaianLaporan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $user->role = 'admin';
        $user->save();
        // Provinsi::factory(10)->create();
        ProvinsiSeeder::run();
        KabKotaSeeder::run();
        KecamatanSeeder::run();
        DosenPembimbing::factory(10)->create();
        Instansi::factory(10)->create();
        PembimbingLapangan::factory(10)->create();
        Mahasiswa::factory(10)->create();
        PemilihanLokasi::factory(10)->create();
        JadwalBimbingan::factory(10)->create();
        KartuKendali::factory(10)->create();
        JurnalingHarian::factory(10)->create();
        JurnalingBulanan::factory(10)->create();
        LaporanAkhir::factory(10)->create();
        PenilaianLaporan::factory(10)->create();
        PenilaianKinerja::factory(10)->create();
        PenilaianBimbingan::factory(10)->create();
        Penilaian::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
