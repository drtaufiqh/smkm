<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\DosenPembimbing;
use App\Models\JadwalBimbingan;
use App\Models\JurnalingHarian;
use App\Models\JurnalingBulanan;

class RoleDospemController extends Controller
{
    public function dashboard()
    {
        return view('dospem.dashboard', [
            'title' => 'Dashboard | Dosen Pembimbing',
            'sidebar' => 'dashboard',
            'circle_sidebar' => ''
        ]);
    }

    public function databaseMahasiswa()
    {
        return view('dospem.database-mahasiswa', [
            'title' => 'Daftar Mahasiswa | Dosen Pembimbing',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function detailBiodata()
    {
        return view('dospem.detail-biodata', [
            'title' => 'Detail Mahasiswa | Dosen Pembimbing',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => '',
            'dosen_pembimbings' => DosenPembimbing::all()
        ]);
    }

    public function jadwalBimbingan()
    {
        return view('dospem.jadwal-bimbingan', [
            'title' => 'Jadwal Bimbingan | Dosen Pembimbing',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => '',
            'jadwal_bimbingans' => JadwalBimbingan::all()
        ]);
    }

    public function jurnalBulanan()
    {
        return view('dospem.jurnal-bulanan', [
            'title' => 'Jurnaling Bulanan | Dosen Pembimbing',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'bulanan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function jurnalHarian()
    {
        return view('dospem.jurnal-harian', [
            'title' => 'Jurnaling Harian | Dosen Pembimbing',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'harian',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function laporanAkhirLookup()
    {
        return view('dospem.laporan-akhir-lookup', [
            'title' => 'Laporan Akhir | Dosen Pembimbing',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }

    public function laporanAkhir()
    {
        return view('dospem.laporan-akhir', [
            'title' => 'Laporan Akhir | Dosen Pembimbing',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function logBookBulanan()
    {
        return view('dospem.log-book-bulanan', [
            'title' => 'Jurnaling Bulanan | Dosen Pembimbing',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'bulanan',
            'jurnaling_bulanans' => JurnalingBulanan::all()
        ]);
    }

    public function logBookHarian()
    {
        return view('dospem.log-book-harian', [
            'title' => 'Jurnaling Harian | Dosen Pembimbing',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'harian',
            'jurnaling_harians' => JurnalingHarian::all()
        ]);
    }

    public function penilaianBimbingan1()
    {
        return view('dospem.penilaian-bimbingan1', [
            'title' => 'Penilaian Bimbingan | Dosen Pembimbing',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'bimbingan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianBimbingan2()
    {
        return view('dospem.penilaian-bimbingan2', [
            'title' => 'Penilaian Bimbingan | Dosen Pembimbing',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'bimbingan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianLaporan1()
    {
        return view('dospem.penilaian-laporan1', [
            'title' => 'Penilaian Laporan | Dosen Pembimbing',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianLaporan2()
    {
        return view('dospem.penilaian-laporan2', [
            'title' => 'Penilaian Laporan | Dosen Pembimbing',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function profil()
    {
        return view('dospem.profil', [
            'title' => 'Profil | Dosen Pembimbing',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }
}
