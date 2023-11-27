<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\TemplateImport;
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
        $user->username = 'admin';
        $user->email = 'admin@stis.ac.id';
        $user->save();
        $user = User::factory()->create();
        $user->role = 'mhs';
        $user->username = 'mahasiswa';
        $user->email = 'mahasiswa@stis.ac.id';
        $user->save();
        $user = User::factory()->create();
        $user->role = 'dospem';
        $user->username = 'dospem';
        $user->email = 'dospem@stis.ac.id';
        $user->save();
        $user = User::factory()->create();
        $user->role = 'pemlap';
        $user->username = 'pemlap';
        $user->email = 'pemlap@stis.ac.id';
        $user->save();
        $user = User::factory()->create();
        $user->role = 'prov';
        $user->username = 'prov';
        $user->email = 'prov@stis.ac.id';
        $user->save();
        $user = User::factory()->create();
        $user->role = 'instansi';
        $user->username = 'instansi';
        $user->email = 'instansi@stis.ac.id';
        $user->save();
        // Provinsi::factory(10)->create();
        ProvinsiSeeder::run();
        KabKotaSeeder::run();
        KecamatanSeeder::run();
        InstansiSeeder::run();

        $admin = new Admin();
        $admin->nama = "Admin";
        $admin->id_user = 1;
        $admin->save();

        DosenPembimbing::factory(9)->create();
        $dospem = DosenPembimbing::factory()->create();
        $dospem->id_user = 3;
        $dospem->save();

        // Instansi::factory(2)->create();
        $instansi = Instansi::factory()->create();
        $instansi->is_prov = false;
        $instansi->id_user = 6;
        // $instansi->id_kabkota = 1;
        // $instansi->save();
        // $instansi->kode_kabkota = $instansi->kabKota->kode;
        $instansi->save();
        $instansi = Instansi::factory()->create();
        $instansi->is_prov = true;
        $instansi->id_user = 5;
        // $instansi->id_kabkota = 2;
        // $instansi->save();
        // $instansi->kode_kabkota = $instansi->kabKota->kode;
        $instansi->save();

        PembimbingLapangan::factory(10)->create();
        $pemlap = PembimbingLapangan::factory()->create();
        $pemlap->id_user = 4;
        $pemlap->save();

        Mahasiswa::factory(10)->create();
        $mhs = Mahasiswa::factory()->create();
        $mhs->id_user = 2;
        $mhs->save();

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
