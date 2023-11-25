<?php

namespace App\Http\Controllers;

use App\Models\finalisasi;
use App\Models\Mahasiswa;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;
use SebastianBergmann\Type\NullType;

class RoleAdminController extends Controller
{
    public function bandingLokasi()
    {
        return view('admin.bandinglokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'banding',
            'pemilihan_lokasis' => PemilihanLokasi::whereNotNull('id_instansi_banding')->get()
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

    public function do_terima_banding($id, $banding){
        // $data = [
        //     'id_instansi' => $banding
        // ];
        // PemilihanLokasi::where('id', $id)->update($data);
        return redirect()->to('/admin/bandinglokasi')->with('success', 'Berhasil meneruskan banding lokasi');
    }

    public function do_tolak_banding($id){
        $data = [
            'id_instansi_banding' => NULL
        ];
        PemilihanLokasi::where('id', $id)->update($data);

        return redirect()->to('/admin/bandinglokasi')->with('success', 'Berhasil menolak banding');
    }

    public function do_finalisasi_lokasi()
    {
        
        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi_ajuan = $pemilihan_lokasi->id_instansi_ajuan;

            if ($id_instansi_ajuan == NULL){
              return redirect()->to('/admin/penentuanlokasi')->with('success', 'Terdapat mahasiswa yang belum diajukan');
            }
        }
        Finalisasi::create([
            'finalisasi_penentuan_lokasi_admin' => 1,
            'finalisasi_banding_lokasi_admin' => 0
        ]);

              return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil finalisasi');
        
    }

    public function do_finalisasi_banding()
    {
        
        // $pemilihan_lokasis = PemilihanLokasi::whereNotNull('id_instansi_banding')->get();

        // foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
        //     $id_instansi_banding = $pemilihan_lokasi->id_instansi_banding;

        //     $pemilihan_lokasi->update(['id_instansi' => $id_instansi_banding]);
        // }

        $finalisasis = Finalisasi::get();
        foreach ($finalisasis as $finalisasi) {

            $finalisasi->update(['finalisasi_banding_lokasi_admin' => 1]);
        }
        return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil finalisasi');
        
    }

}

