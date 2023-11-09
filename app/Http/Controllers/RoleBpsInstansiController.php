<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleBpsInstansiController extends Controller
{
    public function dashboard()
    {
        return view('bps-instansi.dashboard', [
            'title'=> 'Dashboard | Instansi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => ''
        ]);
    }

    public function mahasiswa()
    {
        return view('bps-instansi.mahasiswa', [
            'title'=> 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function presensiMahasiswa()
    {
        return view('bps-instansi.presensimahasiswa', [
            'title'=> 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function pembimbingLap()
    {
        return view('bps-instansi.pembimbinglap', [
            'title'=> 'Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => ''
        ]);
    }

    public function buatPembimbing()
    {
        return view('bps-instansi.buatpembimbing', [
            'title'=> 'Akun Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => ''
        ]);
    }

    public function daftarBimbingan()
    {
        return view('bps-instansi.daftarbimbingan', [
            'title'=> 'Daftar Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function editDaftarBimbingan()
    {
        return view('bps-instansi.editdaftarbimbingan', [
            'title'=> 'Edit Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function tabelBimbingan()
    {
        return view('bps-instansi.tabelbimbingan', [
            'title'=> 'Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }
    
    public function profil()
    {
        return view('bps-instansi.profil', [
            'title'=> 'Profil | Instansi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }
}

