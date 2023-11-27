<?php

namespace App\Http\Controllers;

use App\Imports\AkunMahasiswaImport;
use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;
use Maatwebsite\Excel\Facades\Excel;

class RoleAdminController extends Controller
{
    public function bandingLokasi()
    {
        return view('admin.bandinglokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'banding',
            'pemilihan_lokasis' => PemilihanLokasi::all()
        ]);
    }

    public function dashboard()
    {
        $mhs = Mahasiswa::whereNotNull('id_dosen_pembimbing')->get();
        $mhs2 = Mahasiswa::whereNull('id_dosen_pembimbing')->get();
        $mhsCount = $mhs->count();
        $mhs2Count = $mhs2->count();
        $laporan = LaporanAkhir::whereIn('approval_akhir_kampus', [1])->get();
        $laporan2 = LaporanAkhir::whereIn('approval_akhir_kampus', [0])->get();
        $lapCount = $laporan->count();
        $lap2Count = $laporan2->count();

        return view('admin.dashboard', [
            'title'=> 'Dashboard | Admin',
            'sidebar'=> 'dashboard',
            'circle_sidebar'=> '',
            'mahasiswas' => Mahasiswa::all(),
            'mhs'=>$mhs,
            'mhs2'=>$mhs2,
            'mhsCount' => $mhsCount,
            'mhs2Count' => $mhs2Count,
            'laporan'=>$laporan,
            'laporan2'=>$laporan2,
            'lapCount'=>$lapCount,
            'lap2Count'=>$lap2Count
        ]);
    }

    public function daftarMahasiswa()
    {
        return view('admin.daftar-mahasiswa', [
            'title'=> 'Daftar Mahasiswa | Admin',
            'sidebar'=> 'mahasiswa',
            'circle_sidebar'=> '',
            'mahasiswas' => Mahasiswa::orderBy('id', 'desc')->get(),
            'laporan_akhir' => LaporanAkhir::all()
        ]);
    }
    public function database()
    {
        return view('admin.database', [
            'title'=> 'database | Admin',
            'sidebar'=> 'database',
            'circle_sidebar'=> '',
            'mahasiswas' => Mahasiswa::all(),
            'laporan_akhir' => LaporanAkhir::all()
        ]);
    }

    public function penentuanLokasi()
    {
        return view('admin.penentuanlokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'penentuan',
            'pemilihan_lokasis' => PemilihanLokasi::all()
        ]);
    }

    public function do_tentukanlokasi($id, $pilihan){
        $data = [
            'id_instansi_ajuan' => $pilihan
        ];
        PemilihanLokasi::where('id', $id)->update($data);
        return redirect()->to('/admin/penentuanlokasi');
    }

    public function imporAkunMahasiswa(Request $request){
        // dd($request->file('file_import'));
        $file = $request->file('file_import');
        $namaFile = $file->getClientOriginalName();
        $file->move('AkunMahasiswa', $namaFile);

        Excel::import(new AkunMahasiswaImport, public_path("/AkunMahasiswa/$namaFile"));
        return redirect()->to('/admin/daftar-mahasiswa');
    }
    public function exportTemplateAkunMahasiswa(){
        return response()->download(public_path("/AkunMahasiswa/TemplateDaftarAkunMahasiswa.xlsx"), "Template Daftar Akun Mahasiswa.xlsx");
    }
}

