<?php

use App\Http\Controllers\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KabKotaController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RoleAdminController;
use App\Http\Controllers\RoleDospemController;
use App\Http\Controllers\RolePemlapController;
use App\Http\Controllers\KartuKendaliController;
use App\Http\Controllers\LaporanAkhirController;
use App\Http\Controllers\RoleMahasiswaController;
use App\Http\Controllers\DosenPembimbingController;
use App\Http\Controllers\JadwalBimbinganController;
use App\Http\Controllers\JurnalingHarianController;
use App\Http\Controllers\PemilihanLokasiController;
use App\Http\Controllers\RoleBpsInstansiController;
use App\Http\Controllers\RoleBpsProvinsiController;
use App\Http\Controllers\JurnalingBulananController;
use App\Http\Controllers\PenilaianKinerjaController;
use App\Http\Controllers\PenilaianLaporanController;
use App\Http\Controllers\PembimbingLapanganController;
use App\Http\Controllers\PenilaianBimbinganController;

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


Route::middleware(['auth'])->group(function () {

    # admin
    Route::middleware(['userAkses:admin'])->group(function () {
        Route::get('/admin/bandinglokasi', [RoleAdminController::class, 'bandingLokasi']);
        Route::get('/admin/dashboard', [RoleAdminController::class, 'dashboard']);
        Route::get('/admin/daftar-mahasiswa', [RoleAdminController::class, 'daftarMahasiswa']);
        Route::get('/admin/database', [RoleAdminController::class, 'database']);
        Route::get('/admin/penentuanlokasi', [RoleAdminController::class, 'penentuanLokasi']);

        Route::resource('/admin/users', UserController::class);
        Route::resource('/admin/jurnaling_harians', JurnalingHarianController::class);
        Route::resource('/admin/penilaian_kinerjas', PenilaianKinerjaController::class);
        Route::resource('/admin/penilaian_bimbingans', PenilaianBimbinganController::class);
        Route::resource('/admin/penilaian_laporans', PenilaianLaporanController::class);
        Route::resource('/admin/laporan_akhirs', LaporanAkhirController::class);
        Route::resource('/admin/penilaians', PenilaianController::class);
        Route::resource('/admin/kab_kotas', KabKotaController::class);
        Route::resource('/admin/instansis', InstansiController::class);
        Route::resource('/admin/kecamatans', KecamatanController::class);
        Route::resource('/admin/provinsis', ProvinsiController::class);
        Route::resource('/admin/pemilihan_lokasis', PemilihanLokasiController::class);
        Route::resource('/admin/pembimbing_lapangans', PembimbingLapanganController::class);
        Route::resource('/admin/kartu_kendalis', KartuKendaliController::class);
        Route::resource('/admin/dosen_pembimbings', DosenPembimbingController::class);
        Route::resource('/admin/jurnaling_bulanans', JurnalingBulananController::class);
        Route::resource('/admin/jadwal_bimbingans', JadwalBimbinganController::class);
        Route::resource('/admin/mahasiswas', MahasiswaController::class);

        Route::put('/admin/do_tentukanlokasi/{id}/{pilihan}', [RoleAdminController::class, 'do_tentukanlokasi']);
        Route::get('/admin/export-mahasiswa', [MahasiswaController::class, 'mahasiswaExport']);
        Route::post('/admin/import-mahasiswa', [MahasiswaController::class, 'mahasiswaImportExcel']);

        Route::post('/admin/import-akun-mahasiswa', [RoleAdminController::class, 'imporAkunMahasiswa']);
        Route::get('/admin/export-template-akun-mahasiswa', [RoleAdminController::class, 'exportTemplateAkunMahasiswa']);
        
        Route::put('/admin/do_finalisasi_lokasi', [RoleAdminController::class, 'do_finalisasi_lokasi']);
        Route::put('/admin/do_terima_banding/{id}/{banding}', [RoleAdminController::class, 'do_terima_banding']);
        Route::put('/admin/do_tolak_banding/{id}', [RoleAdminController::class, 'do_tolak_banding']);
        Route::put('/admin/do_finalisasi_banding', [RoleAdminController::class, 'do_finalisasi_banding']);

    });

    # bps instansi
    Route::middleware(['userAkses:instansi'])->group(function () {
        Route::get('/bps-instansi/buatpembimbing', [RoleBpsInstansiController::class, 'buatPembimbing']);
        Route::get('/bps-instansi/daftarbimbingan', [RoleBpsInstansiController::class, 'daftarBimbingan']);
        Route::get('/bps-instansi/dashboard', [RoleBpsInstansiController::class, 'dashboard']);
        Route::get('/bps-instansi/editdaftarbimbingan', [RoleBpsInstansiController::class, 'editDaftarBimbingan']);
        Route::get('/bps-instansi/mahasiswa', [RoleBpsInstansiController::class, 'mahasiswa']);
        Route::get('/bps-instansi/pembimbinglap', [RoleBpsInstansiController::class, 'pembimbingLap']);
        Route::get('/bps-instansi/presensimahasiswa', [RoleBpsInstansiController::class, 'presensiMahasiswa']);
        Route::get('/bps-instansi/profil', [RoleBpsInstansiController::class, 'profil']);
        Route::get('/bps-instansi/tabelbimbingan', [RoleBpsInstansiController::class, 'tabelBimbingan']);
    });

    # bps provinsi
    Route::middleware(['userAkses:prov'])->group(function () {
        Route::get('/bps-provinsi/approvalmahasiswa', [RoleBpsProvinsiController::class, 'approvalMahasiswa']);
        Route::get('/bps-provinsi/bandingmahasiswa', [RoleBpsProvinsiController::class, 'bandingMahasiswa']);
        Route::get('/bps-provinsi/dashboard', [RoleBpsProvinsiController::class, 'dashboard']);
        Route::get('/bps-provinsi/profil', [RoleBpsProvinsiController::class, 'profil']);

        Route::put('/bps-provinsi/setujui-pemilihan/{id}', [RoleBpsProvinsiController::class, 'setujuiPemilihan']);
        Route::put('/bps-provinsi/do_keputusanbanding/{id}/{lokasi_banding}/{action}', [RoleBpsProvinsiController::class, 'do_keputusanbanding']);
        Route::put('/bps-provinsi/do_finalisasi_banding', [RoleBpsProvinsiController::class, 'do_finalisasi_banding']);
        Route::put('/bps-provinsi/tolak-pemilihan/{id}', [RoleBpsProvinsiController::class, 'tolakPemilihan']);
        Route::put('/bps-provinsi/approvalmahasiswa/{id}', [RoleBpsProvinsiController::class, 'updateApprovalMahasiswa'])->name('approvalmahasiswa.update');
        Route::put('/bps-provinsi/do_finalisasi_pemilihan', [RoleBpsProvinsiController::class, 'do_finalisasi_pemilihan']);
    });

    # dospem
    Route::middleware(['userAkses:dospem'])->group(function () {
        Route::get('/dospem/dashboard', [RoleDospemController::class, 'dashboard']);
        Route::get('/dospem/database-mahasiswa', [RoleDospemController::class, 'databaseMahasiswa']);
        Route::get('/dospem/detail-biodata', [RoleDospemController::class, 'detailBiodata']);
        Route::get('/dospem/jadwal-bimbingan', [RoleDospemController::class, 'jadwalBimbingan']);
        Route::get('/dospem/jurnal-bulanan', [RoleDospemController::class, 'jurnalBulanan']);
        Route::get('/dospem/jurnal-harian', [RoleDospemController::class, 'jurnalHarian']);
        Route::get('/dospem/laporan-akhir-lookup', [RoleDospemController::class, 'laporanAkhirLookup']);
        Route::get('/dospem/laporan-akhir', [RoleDospemController::class, 'laporanAkhir']);
        Route::get('/dospem/log-book-bulanan', [RoleDospemController::class, 'logBookBulanan']);
        Route::get('/dospem/log-book-harian', [RoleDospemController::class, 'logBookHarian']);
        Route::get('/dospem/penilaian-bimbingan1', [RoleDospemController::class, 'penilaianBimbingan1']);
        Route::get('/dospem/penilaian-bimbingan2', [RoleDospemController::class, 'penilaianBimbingan2']);
        Route::get('/dospem/penilaian-laporan1', [RoleDospemController::class, 'penilaianLaporan1']);
        Route::get('/dospem/penilaian-laporan2', [RoleDospemController::class, 'penilaianLaporan2']);
        Route::get('/dospem/profil', [RoleDospemController::class, 'profil']);

        // #update profil
        // Route::post('/dospem/update-profil/{user}', [DosenPembimbingController::class, 'updateProfile'])->name('update.profile');
    });

    # mahasiswa
    Route::middleware(['userAkses:mhs'])->group(function () {
        Route::get('/mahasiswa/banding-lokasi', [RoleMahasiswaController::class, 'bandingLokasi']);
        Route::get('/mahasiswa/bimbingan', [RoleMahasiswaController::class, 'bimbingan']);
        Route::get('/mahasiswa/index', [RoleMahasiswaController::class, 'index']);
        Route::get('/mahasiswa/jadwal-bimbingan', [RoleMahasiswaController::class, 'jadwalBimbingan']);
        Route::get('/mahasiswa/laporan-akhir', [RoleMahasiswaController::class, 'laporanAkhir']);
        Route::get('/mahasiswa/log-book-bulanan', [RoleMahasiswaController::class, 'logBookBulanan']);
        Route::get('/mahasiswa/log-book-harian', [RoleMahasiswaController::class, 'logBookHarian']);
        Route::get('/mahasiswa/pemilihan-lokasi', [RoleMahasiswaController::class, 'pemilihanLokasi']);
        Route::post('/mahasiswa/submitted-pemilihan-lokasi/{id_user}', [RoleMahasiswaController::class, 'submittedPemilihanLokasi'])->name('submitted-pemilihan-lokasi');
        Route::get('/mahasiswa/submitted-pemilihan-lokasi', [RoleMahasiswaController::class, 'waitingPemilihanLokasi']);
    });

    # pemlap
    Route::middleware(['userAkses:pemlap'])->group(function () {
        Route::get('/pemlap/dashboard', [RolePemlapController::class, 'dashboard']);
        Route::get('/pemlap/database-mahasiswa', [RolePemlapController::class, 'databaseMahasiswa']);
        Route::get('/pemlap/detail-biodata', [RolePemlapController::class, 'detailBiodata']);
        Route::get('/pemlap/jurnal-bulanan', [RolePemlapController::class, 'jurnalBulanan']);
        Route::get('/pemlap/jurnal-harian', [RolePemlapController::class, 'jurnalHarian']);
        Route::get('/pemlap/laporan-akhir-lookup', [RolePemlapController::class, 'laporanAkhirLookup']);
        Route::get('/pemlap/laporan-akhir', [RolePemlapController::class, 'laporanAkhir']);
        Route::get('/pemlap/log-book-bulanan', [RolePemlapController::class, 'logBookBulanan']);
        Route::get('/pemlap/log-book-harian', [RolePemlapController::class, 'logBookHarian']);
        Route::get('/pemlap/penilaian-kinerja1', [RolePemlapController::class, 'penilaianKinerja1']);
        Route::get('/pemlap/penilaian-kinerja2', [RolePemlapController::class, 'penilaianKinerja2']);
        Route::get('/pemlap/penilaian-laporan1', [RolePemlapController::class, 'penilaianLaporan1']);
        Route::get('/pemlap/penilaian-laporan2', [RolePemlapController::class, 'penilaianLaporan2']);
        Route::get('/pemlap/profil', [RolePemlapController::class, 'profil']);
    });

    # home
    Route::get('/home', [SesiController::class, 'home']);
});

# middleware
Route::middleware(['guest'])->group(function () {
    # login
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});


// Route::get('/admin', [RoleAdminController::class,'index']);

Route::get('/logout', [SesiController::class, 'logout']);
