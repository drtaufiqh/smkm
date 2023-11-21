<?php

namespace App\Http\Controllers;

use App\Models\finalisasi;
use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;

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
        return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil mengubah lokasi ajuan');
    }

    public function do_finalisasi_lokasi()
    {
        
        // Ambil semua baris dari tabel pemilihan_lokasis
        $pemilihan_lokasis = PemilihanLokasi::get();

        // Loop melalui setiap baris dan lakukan operasi
        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            // Ambil nilai id_instansi_tujuan dari baris saat ini
            $id_instansi_ajuan = $pemilihan_lokasi->id_instansi_ajuan;

            // Update kolom id_instansi pada baris saat ini dengan nilai id_instansi_ajuan
            $pemilihan_lokasi->update(['id_instansi' => $id_instansi_ajuan]);
        }
        Finalisasi::create([
            // Sesuaikan dengan kolom-kolom dan nilai-nilai yang sesuai di tabel instansis
            'finalisasi_penentuan_lokasi_admin' => 1,
            'finalisasi_banding_lokasi_admin' => 0
        ]);

              return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil finalisasi');
        
    }

}

