<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolePemlapController extends Controller
{
    public function dashboard()
    {
        return view('pemlap.dashboard', [
            'title'=> 'Dashboard | Pembimbing Lapangan',
            'sidebar' => 'dashboard',
            'circle_sidebar' => ''
        ]);
    }

    public function databaseMahasiswa()
    {
        return view('pemlap.database-mahasiswa', [
            'title'=> 'Daftar Mahasiswa | Pembimbing Lapangan',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function detailBiodata()
    {
        return view('pemlap.detail-biodata', [
            'title'=> 'Detail Mahasiswa | Pembimbing Lapangan',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function jurnalBulanan()
    {
        return view('pemlap.jurnal-bulanan', [
            'title'=> 'Jurnaling Bulanan | Pembimbing Lapangan',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'bulanan'
        ]);
    }

    public function jurnalHarian()
    {
        return view('pemlap.jurnal-harian', [
            'title'=> 'Jurnaling Harian | Pembimbing Lapangan',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'harian'
        ]);
    }

    public function laporanAkhirLookup()
    {
        return view('pemlap.laporan-akhir-lookup', [
            'title'=> 'Laporan Akhir | Pembimbing Lapangan',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => ''
        ]);
    }

    public function laporanAkhir()
    {
        return view('pemlap.laporan-akhir', [
            'title'=> 'Laporan Akhir | Pembimbing Lapangan',
            'sidebar' => 'laporan akhir',
            'circle_sidebar' => ''
        ]);
    }

    public function logBookBulanan()
    {
        return view('pemlap.log-book-bulanan', [
            'title'=> 'Jurnaling Bulanan | Pembimbing Lapangan',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'bulanan'
        ]);
    }

    public function logBookHarian()
    {
        return view('pemlap.log-book-harian', [
            'title'=> 'Jurnaling Harian | Pembimbing Lapangan',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'harian'
        ]);
    }

    public function penilaianKinerja1()
    {
        return view('pemlap.penilaian-kinerja1', [
            'title'=> 'Penilaian Kinerja | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'kinerja'
        ]);
    }

    public function penilaianKinerja2()
    {
        return view('pemlap.penilaian-kinerja2', [
            'title'=> 'Penilaian Kinerja | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'kinerja'
        ]);
    }

    public function penilaianLaporan1()
    {
        return view('pemlap.penilaian-laporan1', [
            'title'=> 'Penilaian Laporan | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan'
        ]);
    }

    public function penilaianLaporan2()
    {
        return view('pemlap.penilaian-laporan2', [
            'title'=> 'Penilaian Laporan | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan'
        ]);
    }

    public function profil()
    {
        return view('pemlap.profil', [
            'title'=> 'Profil | Pembimbing Lapangan',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }
}
