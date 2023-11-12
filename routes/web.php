<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleAdminController;
use App\Http\Controllers\RoleDospemController;
use App\Http\Controllers\RolePemlapController;
use App\Http\Controllers\RoleMahasiswaController;
use App\Http\Controllers\RoleBpsInstansiController;
use App\Http\Controllers\RoleBpsProvinsiController;
use App\Http\Controllers\SesiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware(['auth'])->group(function() {

    # admin
    Route::middleware(['userAkses:admin'])->group(function() {
        Route::get('/admin-bandinglokasi', [RoleAdminController::class, 'bandingLokasi']);
        Route::get('/admin-dashboard', [RoleAdminController::class, 'dashboard']);
        Route::get('/admin-database', [RoleAdminController::class, 'database']);
        Route::get('/admin-penentuanlokasi', [RoleAdminController::class, 'penentuanLokasi']);
    });

    # bps instansi
    Route::middleware(['userAkses:instansi'])->group(function() {
        Route::get('/bps-instansi-buatpembimbing', [RoleBpsInstansiController::class, 'buatPembimbing']);
        Route::get('/bps-instansi-daftarbimbingan', [RoleBpsInstansiController::class, 'daftarBimbingan']);
        Route::get('/bps-instansi-dashboard', [RoleBpsInstansiController::class, 'dashboard']);
        Route::get('/bps-instansi-editdaftarbimbingan', [RoleBpsInstansiController::class, 'editDaftarBimbingan']);
        Route::get('/bps-instansi-mahasiswa', [RoleBpsInstansiController::class, 'mahasiswa']);
        Route::get('/bps-instansi-pembimbinglap', [RoleBpsInstansiController::class, 'pembimbingLap']);
        Route::get('/bps-instansi-presensimahasiswa', [RoleBpsInstansiController::class, 'presensiMahasiswa']);
        Route::get('/bps-instansi-profil', [RoleBpsInstansiController::class, 'profil']);
        Route::get('/bps-instansi-tabelbimbingan', [RoleBpsInstansiController::class, 'tabelBimbingan']);
    });

    # bps provinsi
    Route::middleware(['userAkses:prov'])->group(function() {
        Route::get('/bps-provinsi-approvalmahasiswa', [RoleBpsProvinsiController::class, 'approvalMahasiswa']);
        Route::get('/bps-provinsi-bandingmahasiswa', [RoleBpsProvinsiController::class, 'bandingMahasiswa']);
        Route::get('/bps-provinsi-dashboard', [RoleBpsProvinsiController::class, 'dashboard']);
        Route::get('/bps-provinsi-profil', [RoleBpsProvinsiController::class, 'profil']);
    });

    # dospem
    Route::middleware(['userAkses:dospem'])->group(function() {
        Route::get('/dospem-dashboard', [RoleDospemController::class, 'dashboard']);
        Route::get('/dospem-database-mahasiswa', [RoleDospemController::class, 'databaseMahasiswa']);
        Route::get('/dospem-detail-biodata', [RoleDospemController::class, 'detailBiodata']);
        Route::get('/dospem-jadwal-bimbingan', [RoleDospemController::class, 'jadwalBimbingan']);
        Route::get('/dospem-jurnal-bulanan', [RoleDospemController::class, 'jurnalBulanan']);
        Route::get('/dospem-jurnal-harian', [RoleDospemController::class, 'jurnalHarian']);
        Route::get('/dospem-laporan-akhir-lookup', [RoleDospemController::class, 'laporanAkhirLookup']);
        Route::get('/dospem-laporan-akhir', [RoleDospemController::class, 'laporanAkhir']);
        Route::get('/dospem-log-book-bulanan', [RoleDospemController::class, 'logBookBulanan']);
        Route::get('/dospem-log-book-harian', [RoleDospemController::class, 'logBookHarian']);
        Route::get('/dospem-penilaian-bimbingan1', [RoleDospemController::class, 'penilaianBimbingan1']);
        Route::get('/dospem-penilaian-bimbingan2', [RoleDospemController::class, 'penilaianBimbingan2']);
        Route::get('/dospem-penilaian-laporan1', [RoleDospemController::class, 'penilaianLaporan1']);
        Route::get('/dospem-penilaian-laporan2', [RoleDospemController::class, 'penilaianLaporan2']);
        Route::get('/dospem-profil', [RoleDospemController::class, 'profil']);
    });

    # mahasiswa
    Route::middleware(['userAkses:mhs'])->group(function() {
        Route::get('/mahasiswa-banding-lokasi', [RoleMahasiswaController::class, 'bandingLokasi']);
        Route::get('/mahasiswa-bimbingan', [RoleMahasiswaController::class, 'bimbingan']);
        Route::get('/mahasiswa-index', [RoleMahasiswaController::class, 'index']);
        Route::get('/mahasiswa-jadwal-bimbingan', [RoleMahasiswaController::class, 'jadwalBimbingan']);
        Route::get('/mahasiswa-laporan-akhir', [RoleMahasiswaController::class, 'laporanAkhir']);
        Route::get('/mahasiswa-log-book-bulanan', [RoleMahasiswaController::class, 'logBookBulanan']);
        Route::get('/mahasiswa-log-book-harian', [RoleMahasiswaController::class, 'logBookHarian']);
        Route::get('/mahasiswa-pemilihan-lokasi', [RoleMahasiswaController::class, 'pemilihanLokasi']);
    });

    # pemlap
    Route::middleware(['userAkses:pemlap'])->group(function() {
        Route::get('/pemlap-dashboard', [RolePemlapController::class, 'dashboard']);
        Route::get('/pemlap-database-mahasiswa', [RolePemlapController::class, 'databaseMahasiswa']);
        Route::get('/pemlap-detail-biodata', [RolePemlapController::class, 'detailBiodata']);
        Route::get('/pemlap-jurnal-bulanan', [RolePemlapController::class, 'jurnalBulanan']);
        Route::get('/pemlap-jurnal-harian', [RolePemlapController::class, 'jurnalHarian']);
        Route::get('/pemlap-laporan-akhir-lookup', [RolePemlapController::class, 'laporanAkhirLookup']);
        Route::get('/pemlap-laporan-akhir', [RolePemlapController::class, 'laporanAkhir']);
        Route::get('/pemlap-log-book-bulanan', [RolePemlapController::class, 'logBookBulanan']);
        Route::get('/pemlap-log-book-harian', [RolePemlapController::class, 'logBookHarian']);
        Route::get('/pemlap-penilaian-kinerja1', [RolePemlapController::class, 'penilaianKinerja1']);
        Route::get('/pemlap-penilaian-kinerja2', [RolePemlapController::class, 'penilaianKinerja2']);
        Route::get('/pemlap-penilaian-laporan1', [RolePemlapController::class, 'penilaianLaporan1']);
        Route::get('/pemlap-penilaian-laporan2', [RolePemlapController::class, 'penilaianLaporan2']);
        Route::get('/pemlap-profil', [RolePemlapController::class, 'profil']);
    });

    # home
    Route::get('/home', [SesiController::class, 'home']);
});

# middleware
Route::middleware(['guest'])->group(function() {
    # login
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});


// Route::get('/admin', [RoleAdminController::class,'index']);

Route::get('/logout', [SesiController::class, 'logout']);