<?php

namespace App\Http\Controllers;

use App\Models\Finalisasi;
use App\Models\KabKota;
use App\Models\Instansi;
use App\Models\Provinsi;
use App\Models\Mahasiswa;
use App\Models\KartuKendali;
use App\Models\LaporanAkhir;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JadwalBimbingan;
use App\Models\JurnalingHarian;
use App\Models\JurnalingBulanan;
use App\Models\PemilihanLokasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ramsey\Collection\Set;

class RoleMahasiswaController extends Controller
{
    public function bandingLokasi()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        if($pemilihan_lokasi->id_instansi_banding){
            return redirect()->to('/mahasiswa/submitted-banding-lokasi');
        }

        $mahasiswas = Mahasiswa::all();
        $instansis = Instansi::all();
        $pemilihan_lokasis = PemilihanLokasi::all();
        return view('mahasiswa.banding-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'provinsis' => Provinsi::all(),
            'kab_kotas' => KabKota::all(),
            'instansis' => Instansi::all(),
            'mahasiswas' => $mahasiswas,
            'instansis' => $instansis,
            'pemilihan_lokasis' => $pemilihan_lokasis
        ]);
    }

    public function bimbingan()
    {
        $jadwal_bimbingans = JadwalBimbingan::all();
        $kartu_kendalis = KartuKendali::all();

        return view('mahasiswa.bimbingan', [
            'title' => 'Bimbingan | Mahasiswa',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => 'jadwal',
            'jadwal_bimbingans' => $jadwal_bimbingans,
            'kartu_kendalis' => $kartu_kendalis
        ]);
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $jurnal = JurnalingHarian::whereNotNull('tanggal')->get();

        $jurnalCount = $jurnal->count();

        return view('mahasiswa.index', [
            'title' => 'Dashboard | Mahasiswa',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'jurnaling_harians' => JurnalingHarian::all(),
            'mahasiswas' => $mahasiswas,
            'jurnal' => $jurnal,
            'jurnalCount' => $jurnalCount,
        ]);
    }

    public function jadwalBimbingan()
    {
        $jadwal_bimbingans = JadwalBimbingan::all();

        return view('mahasiswa.jadwal-bimbingan', [
            'title' => 'Jadwal Bimbingan',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => 'jadwal',
            'jadwal_bimbingans' => $jadwal_bimbingans,

        ]);
    }

    public function laporanAkhir()
    {
        $mahasiswas = Mahasiswa::all();
        $laporan_akhirs = LaporanAkhir::all();
        $pemilihan_lokasis = PemilihanLokasi::all();

        return view('mahasiswa.laporan-akhir', [
            'title' => 'Laporan Akhir | Mahasiswa',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => '',
            'mahasiswas' => $mahasiswas,
            'laporan_akhirs' => $laporan_akhirs,
            'pemilihan_lokasis' => $pemilihan_lokasis
        ]);
    }

    public function logBookBulanan()
    {
        return view('mahasiswa.log-book-bulanan', [
            'title' => 'Log Book | Mahasiswa',
            'sidebar' => 'log book',
            'circle_sidebar' => 'bulanan',
            'jurnaling_bulanans' => JurnalingBulanan::all()
        ]);
    }

    public function logBookHarian()
    {
        return view('mahasiswa.log-book-harian', [
            'title' => 'Log Book | Mahasiswa',
            'sidebar' => 'log book',
            'circle_sidebar' => 'harian',
            'jurnaling_harians' => JurnalingHarian::all()
        ]);
    }

    public function pemilihanLokasi()
    {
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        if($pemilihan_lokasi){
            return redirect()->to('/mahasiswa/submitted-pemilihan-lokasi');
        }
        return view('mahasiswa.pemilihan-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'provinsis' => Provinsi::all(),
            'kab_kotas' => KabKota::all(),
            'instansis' => Instansi::all()
        ]);
    }

    public function submittedPemilihanLokasi(Request $request, $id_user)
    {
        $data = [
            'id_mhs' => $id_user,
            'id_pilihan_1' => $request->input('id_pilihan_1'),
            'id_pilihan_2' => $request->input('id_pilihan_2'),
            'alasan_pilihan_1' => $request->input('alasan_pilihan_1'),
            'alasan_pilihan_2' => $request->input('alasan_pilihan_2')
        ];

        PemilihanLokasi::create($data);
        return redirect()->to('/mahasiswa/submitted-pemilihan-lokasi');
    }

    public function waitingPemilihanLokasi()
    {
        $finalisasiPenentuanBpsProvDone = Finalisasi::isFinalisasiPenentuanBpsProvDone();
        if($finalisasiPenentuanBpsProvDone){
            return redirect()->to('/mahasiswa/banding-lokasi');
        }

        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();
        return view('mahasiswa.submitted-pemilihan-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }


    public function submittedBandingLokasi(Request $request, $id_user)
    {
        $data = [
            'id_instansi_banding' => $request->input('id_instansi_banding'),
            'alasan_banding' => $request->input('alasan_banding')
        ];

        PemilihanLokasi::where('id_mhs',$id_user)->update($data);
        return redirect()->to('/mahasiswa/submitted-banding-lokasi');
    }

    public function waitingBandingLokasi(){
        $finalisasiBandingBpsProvDone = Finalisasi::isFinalisasiBandingBpsProvDone();
        if($finalisasiBandingBpsProvDone){
            return redirect()->to('/mahasiswa/lokasi-magang');
        }

        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();

        return view('mahasiswa.submitted-banding-lokasi', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }
    public function lokasiMagang(){
        $mhs = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $pemilihan_lokasi = PemilihanLokasi::where('id_mhs', $mhs->id)->first();

        return view('mahasiswa.lokasi-magang', [
            'title' => 'Lokasi Magang | Mahasiswa',
            'sidebar' => 'lokasi',
            'circle_sidebar' => '',
            'pemilihan_lokasi' => $pemilihan_lokasi
        ]);
    }

}
