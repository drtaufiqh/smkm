<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleMahasiswaController extends Controller
{
    public function bandingLokasi()
    {
        return view('mahasiswa.banding-lokasi', [
            'title'=> 'Lokasi Magang | Mahasiswa',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> ''
        ]);
    }

    public function bimbingan()
    {
        return view('mahasiswa.bimbingan', [
            'title'=> 'Bimbingan | Mahasiswa',
            'sidebar'=> 'bimbingan',
            'circle_sidebar'=> 'jadwal'
        ]);
    }

    public function index()
    {
        return view('mahasiswa.index', [
            'title'=> 'Dashboard | Mahasiswa',
            'sidebar'=> 'dashboard',
            'circle_sidebar'=> ''
        ]);
    }

    public function jadwalBimbingan()
    {
        return view('mahasiswa.jadwal-bimbingan', [
            'title'=> 'Jadwal Bimbingan',
            'sidebar'=> 'bimbingan',
            'circle_sidebar'=> 'jadwal'
        ]);
    }

    public function laporanAkhir()
    {
        return view('mahasiswa.laporan-akhir', [
            'title'=> 'Laporan Akhir | Mahasiswa',
            'sidebar'=> 'laporan akhir',
            'circle_sidebar'=> ''
        ]);
    }

    public function logBookBulanan()
    {
        return view('mahasiswa.log-book-bulanan', [
            'title'=> 'Log Book | Mahasiswa',
            'sidebar'=> 'log book',
            'circle_sidebar'=> 'bulanan'
        ]);
    }

    public function logBookHarian()
    {
        return view('mahasiswa.log-book-harian', [
            'title'=> 'Log Book | Mahasiswa',
            'sidebar'=> 'log book',
            'circle_sidebar'=> 'harian'
        ]);
    }

    public function pemilihanLokasi()
    {
        return view('mahasiswa.pemilihan-lokasi', [
            'title'=> 'Lokasi Magang | Mahasiswa',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> ''
        ]);
    }
}
