<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PembimbingLapangan;

class RoleBpsInstansiController extends Controller
{
    public function dashboard()
    {
        $mhs1 = Mahasiswa::whereNotNull('id_pembimbing_lapangan')->get();
        $mhs2 = Mahasiswa::whereNull('id_pembimbing_lapangan')->get();
        $pl1 = Mahasiswa::all();
        $pl2 = PembimbingLapangan::all();

        $mhs1Count = $mhs1->count();
        $mhs2Count = $mhs2->count();
        $pl1Count = $pl1->count();
        $pl2Count = $pl2->count();

        return view('bps-instansi.dashboard', [
            'title' => 'Dashboard | Instansi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'mhs1' => $mhs1,
            'mhs2' => $mhs2,
            'pl1' => $pl1,
            'pl2' => $pl2,
            'mhs1Count' => $mhs1Count,
            'mhs2Count' => $mhs2Count,
            'pl1Count' => $pl1Count,
            'pl2Count' => $pl2Count
        ]);
    }

    public function mahasiswa()
    {
        return view('bps-instansi.mahasiswa', [
            'title' => 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function presensiMahasiswa()
    {
        return view('bps-instansi.presensimahasiswa', [
            'title' => 'Mahasiswa | Instansi',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => ''
        ]);
    }

    public function pembimbingLap()
    {
        return view('bps-instansi.pembimbinglap', [
            'title' => 'Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => '',
            'pembimbing_lapangans' => PembimbingLapangan::all()
        ]);
    }

    public function buatPembimbing()
    {
        return view('bps-instansi.buatpembimbing', [
            'title' => 'Akun Pembimbing Lapangan | Instansi',
            'sidebar' => 'pembimbing',
            'circle_sidebar' => ''
        ]);
    }

    public function daftarBimbingan()
    {
        return view('bps-instansi.daftarbimbingan', [
            'title' => 'Daftar Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function editDaftarBimbingan()
    {
        return view('bps-instansi.editdaftarbimbingan', [
            'title' => 'Edit Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => ''
        ]);
    }

    public function tabelBimbingan()
    {
        return view('bps-instansi.tabelbimbingan', [
            'title' => 'Bimbingan | Instansi',
            'sidebar' => 'bimbingan',
            'circle_sidebar' => '',
            'pembimbing_lapangans' => PembimbingLapangan::all(),
        ]);
    }

    public function profil()
    {
        return view('bps-instansi.profil', [
            'title' => 'Profil | Instansi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }
}
