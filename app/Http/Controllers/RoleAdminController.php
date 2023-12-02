<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\finalisasi;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;
use App\Imports\AkunMahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

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
        $lokasi_blm = Mahasiswa::all()->count()-PemilihanLokasi::whereNull('id_pilihan_1')->get()->count();
        $lokasi_sdh = PemilihanLokasi::whereNotNull('id_pilihan_1')->get()->count();
        $lokasi_wait_admin = PemilihanLokasi::whereNotNull('id_pilihan_1')->get()->count() - PemilihanLokasi::whereNull('id_instansi_ajuan')->get()->count();
        $lokasi_wait_instansi = PemilihanLokasi::whereNotNull('id_instansi_ajuan')->get()->count() - PemilihanLokasi::whereNull('id_instansi')->get()->count();
        $lokasi_final = PemilihanLokasi::whereNotNull('id_instansi')->get()->count();
        $lokasi_banding = PemilihanLokasi::whereNotNull('id_instansi_banding')->get()->count();

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
            'lap2Count'=>$lap2Count,
            'lokasi_blm'=>$lokasi_blm,
            'lokasi_sdh'=>$lokasi_sdh,
            'lokasi_wait_admin'=>$lokasi_wait_admin,
            'lokasi_wait_instansi'=>$lokasi_wait_instansi,
            'lokasi_final'=>$lokasi_final,
            'lokasi_banding'=>$lokasi_banding
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

    public function penentuandosbing()
    {
        return view('admin.pemilihandosbing', [
            'title'=> 'Dosen Pembimbing | Admin',
            'sidebar'=> 'dosbing',
            'circle_sidebar'=> '',
            'pemilihan_lokasis' => PemilihanLokasi::all(),
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }

    public function do_tentukanlokasi($id, $pilihan){
        $data = [
            'id_instansi_ajuan' => $pilihan
        ];
        PemilihanLokasi::where('id', $id)->update($data);
        // return response()->json(['message' => 'ok']);
        return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil mengubah lokasi ajuan');
    }

    // public function do_tentukanlokasi($id, $pilihan){
    //     $data = [
    //         'id_instansi_ajuan' => $pilihan
    //     ];
    
    //     // Update data pada database
    //     PemilihanLokasi::where('id', $id)->update($data);
    
    //     // Mengembalikan respons dalam format JSON
    //     return response()->json(['success' => true, 'message' => 'Berhasil mengubah lokasi ajuan']);
    // }
    

    public function do_terima_banding($id, $banding){
        $data = [
            'id_instansi' => null
        ];
        PemilihanLokasi::where('id', $id)->first()->mahasiswa->update($data);
        $data = [
            'admin_setuju_banding' => 1
        ];
        PemilihanLokasi::where('id', $id)->update($data);
        return redirect()->to('/admin/bandinglokasi')->with('success', 'Berhasil meneruskan banding lokasi');
    }

    public function do_tolak_banding($id){
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $data = [
            'id_instansi' => $pemilihan_lokasi->id_instansi
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        $pemilihan_lokasi->update(['admin_setuju_banding' => null]);

        return redirect()->to('/admin/bandinglokasi')->with('success', 'Berhasil menolak banding');
    }

    public function do_finalisasi_lokasi()
    {
        # memeriksa apakah semua lokasi mahasiswa udah diajukan
        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi_ajuan = $pemilihan_lokasi->id_instansi_ajuan;
            # kalo ada yang belum berarti gagal
            if ($id_instansi_ajuan == NULL){
                return redirect()->to('/admin/penentuanlokasi')->with('failed', 'Terdapat mahasiswa yang belum diajukan');
            }
        }
        #logic finalisasi
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


        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi = $pemilihan_lokasi->mahasiswa->id_instansi;

            if (!$id_instansi) {
                if(!$pemilihan_lokasi->admin_setuju_banding){
                    return redirect()->to('/admin/bandinglokasi')->with('failed', 'Terdapat mahasiswa yang belum diberi keputusan');
                }
            }
        }

        $finalisasis = Finalisasi::get();
        foreach ($finalisasis as $finalisasi) {
            $finalisasi->update(['finalisasi_banding_lokasi_admin' => 1]);
        }
        return redirect()->to('/admin/bandinglokasi')->with('success', 'Berhasil finalisasi');
        
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

