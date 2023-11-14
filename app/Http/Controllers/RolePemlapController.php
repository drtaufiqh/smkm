<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PenilaianKinerja;

class RolePemlapController extends Controller
{
    public function dashboard()
    {
        $laporan = LaporanAkhir::whereIn('approval_akhir_pemlap', [1])->get();
        $laporan2 = LaporanAkhir::whereIn('approval_akhir_pemlap', [0])->get();
        $lapCount = $laporan->count();
        $lap2Count = $laporan2->count();
        $nilai = LaporanAkhir::whereNotNull('approval_akhir_pemlap')->get();
        $nilai2 = LaporanAkhir::whereNull('approval_akhir_pemlap')->get();
        $nilaiCount = $nilai->count();
        $nilai2Count = $nilai2->count();
        $kinerja = PenilaianKinerja::whereNotNull('nilai_k1')
                                    ->whereNotNull('nilai_k2')
                                    ->whereNotNull('nilai_k3')
                                    ->whereNotNull('nilai_k4')
                                    ->whereNotNull('nilai_k5')
                                    ->whereNotNull('nilai_k6')
                                    ->whereNotNull('nilai_k7')
                                    ->whereNotNull('nilai_k8')
                                    ->whereNotNull('nilai_k9')
                                    ->whereNotNull('nilai_k10')
                                    ->get();
        $kinerja2 = PenilaianKinerja::whereNull('nilai_k1')
                                    ->whereNull('nilai_k2')
                                    ->whereNull('nilai_k3')
                                    ->whereNull('nilai_k4')
                                    ->whereNull('nilai_k5')
                                    ->whereNull('nilai_k6')
                                    ->whereNull('nilai_k7')
                                    ->whereNull('nilai_k8')
                                    ->whereNull('nilai_k9')
                                    ->whereNull('nilai_k10')
                                    ->get();
        $kinerjaCount = $kinerja->count();
        $kinerja2Count = $kinerja2->count();


        return view('pemlap.dashboard', [
            'title'=> 'Dashboard | Pembimbing Lapangan',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all(),
            'laporan'=>$laporan,
            'laporan2'=>$laporan2,
            'lapCount'=>$lapCount,
            'lap2Count'=>$lap2Count,
            'nilai'=>$nilai,
            'nilai2'=>$nilai2,
            'nilaiCount'=>$nilaiCount,
            'nilai2Count'=>$nilai2Count,
            'kinerja'=>$kinerja,
            'kinerja2'=>$kinerja2,
            'kinerjaCount'=>$kinerjaCount,
            'kinerja2Count'=>$kinerja2Count
        ]);
    }

    public function databaseMahasiswa()
    {
        return view('pemlap.database-mahasiswa', [
            'title'=> 'Daftar Mahasiswa | Pembimbing Lapangan',
            'sidebar' => 'mahasiswa',
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
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
            'circle_sidebar' => 'bulanan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function jurnalHarian()
    {
        return view('pemlap.jurnal-harian', [
            'title'=> 'Jurnaling Harian | Pembimbing Lapangan',
            'sidebar' => 'jurnaling',
            'circle_sidebar' => 'harian',
            'mahasiswas' => Mahasiswa::all()
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
            'circle_sidebar' => '',
            'mahasiswas' => Mahasiswa::all()
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
            'circle_sidebar' => 'kinerja',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianKinerja2()
    {
        return view('pemlap.penilaian-kinerja2', [
            'title'=> 'Penilaian Kinerja | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'kinerja',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianLaporan1()
    {
        return view('pemlap.penilaian-laporan1', [
            'title'=> 'Penilaian Laporan | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penilaianLaporan2()
    {
        return view('pemlap.penilaian-laporan2', [
            'title'=> 'Penilaian Laporan | Pembimbing Lapangan',
            'sidebar' => 'penilaian',
            'circle_sidebar' => 'laporan',
            'mahasiswas' => Mahasiswa::all()
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
