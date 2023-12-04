<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instansi;
use App\Models\Mahasiswa;
use App\Models\Finalisasi;
use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;
use App\Exports\AkunBpsProvExport;
use App\Imports\AkunBpsProvImport;
use App\Exports\AkunMahasiswaExport;
use App\Imports\AkunMahasiswaImport;
use Illuminate\Support\Facades\Auth;
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
        $mahasiswa_count = Mahasiswa::all()->count();
        $lokasi_blm = Mahasiswa::all()->count()-PemilihanLokasi::whereNotNull('id_pilihan_1')->get()->count();
        $lokasi_sdh = PemilihanLokasi::whereNotNull('id_pilihan_1')->get()->count();
        $lokasi_wait_admin = $lokasi_sdh - PemilihanLokasi::whereNotNull('id_instansi_ajuan')->get()->count();
        $lokasi_wait_instansi = PemilihanLokasi::whereNotNull('id_instansi_ajuan')->get()->count() - PemilihanLokasi::whereNotNull('id_instansi')->get()->count();
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
            'mahasiswa_count'=>$mahasiswa_count,
            'lokasi_blm'=>$lokasi_blm,
            'lokasi_sdh'=>$lokasi_sdh,
            'lokasi_wait_admin'=>$lokasi_wait_admin,
            'lokasi_wait_instansi'=>$lokasi_wait_instansi,
            'lokasi_final'=>$lokasi_final,
            'lokasi_banding'=>$lokasi_banding
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
        $jumlahbaris = 10;
        $pemilihan_lokasis = PemilihanLokasi::orderBy('id', 'desc')->paginate($jumlahbaris);
        // $pemilihan_lokasis = PemilihanLokasi::all();
        return view('admin.penentuanlokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'penentuan',
            'pemilihan_lokasis' => $pemilihan_lokasis
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
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $pemilihan_lokasi->update($data);
        $nama = $pemilihan_lokasi->instansiAjuan->nama;
        // return response()->json(['message' => 'ok']);
        // return redirect()->to('/admin/penentuanlokasi')->with('success', 'Berhasil mengubah lokasi ajuan');
        return response()->json(['success' => true, 'message' => 'Nilai berhasil diubah', 'nama' => $nama]);
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
        Finalisasi::whereNull('finalisasi_penentuan_lokasi_admin')->update([
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

    // Daftar Mahasiswa
    public function daftarMahasiswa()
    {
        return view('admin.daftar-mahasiswa', [
            'title'=> 'Daftar Mahasiswa | Admin',
            'sidebar'=> 'mahasiswa',
            'circle_sidebar'=> '',
            'mahasiswas' => Mahasiswa::orderBy('id', 'desc')->get(),
            // 'laporan_akhir' => LaporanAkhir::all()
        ]);
    }

    public function detailMahasiswa($id_mhs)
    {
        return view('admin.detail-mahasiswa', [
            'title'=> 'Detail Mahasiswa | Admin',
            'sidebar'=> 'mahasiswa',
            'circle_sidebar'=> '',
            'mahasiswa' => Mahasiswa::find($id_mhs),
        ]);
    }

    public function imporAkunMahasiswa(Request $request){
        // dd($request->file('file_import'));
        $file = $request->file('file_import');
        $namaFile = $file->getClientOriginalName();
        $namaFile = 'cek.'.pathinfo($namaFile, PATHINFO_EXTENSION);
        $file->move('AkunMahasiswa', $namaFile);

        Excel::import(new AkunMahasiswaImport, public_path("/AkunMahasiswa/$namaFile"));
        return redirect()->to('/admin/daftar-mahasiswa');
    }
    public function exportTemplateAkunMahasiswa(){
        return response()->download(public_path("/AkunMahasiswa/TemplateDaftarAkunMahasiswa.xlsx"), "Template Daftar Akun Mahasiswa.xlsx");
    }

    public function exportAkunMahasiswa(){
        return Excel::download(new AkunMahasiswaExport, 'Mahasiswa.xlsx');
    }

    public function deleteAkunMahasiswa($id)
    {
        $mhs = Mahasiswa::find($id);
        User::where('id', $mhs->id_user)->delete();
        PemilihanLokasi::where('id_mhs', $mhs->id)->delete();
        Mahasiswa::where('id', $id)->delete();
        return redirect()->to('/admin/daftar-mahasiswa')->with('success','Data berhasil dihapus!');
    }

    public function deleteAllAkunMahasiswa()
    {
        User::where('role', 'mhs')->delete();
        // Mahasiswa::all()->delete();
        foreach (Mahasiswa::all() as $mahasiswa) {
            PemilihanLokasi::where('id_mhs', $mahasiswa->id)->delete();
            $mahasiswa->delete();
        }
        return redirect()->to('/admin/daftar-mahasiswa')->with('success','Seluruh data berhasil dihapus!');
    }

    public function daftarBpsProv()
    {
        return view('admin.daftar-bpsprov', [
            'title'=> 'Daftar BPS Provinsi | Admin',
            'sidebar'=> 'bpsprov',
            'circle_sidebar'=> '',
            'bpsprovs' => Instansi::orderBy('id', 'asc')->where('is_prov', 1)->get(),
            // 'laporan_akhir' => LaporanAkhir::all()
        ]);
    }

    public function detailBpsProv($id_bpsprov)
    {
        return view('admin.detail-bpsprov', [
            'title'=> 'Detail bpsprov | Admin',
            'sidebar'=> 'bpsprov',
            'circle_sidebar'=> '',
            'bpsprov' => Instansi::find($id_bpsprov),
        ]);
    }

    public function imporAkunBpsProv(Request $request){
        // dd($request->file('file_import'));
        $file = $request->file('file_import');
        $namaFile = $file->getClientOriginalName();
        $namaFile = 'cek.'.pathinfo($namaFile, PATHINFO_EXTENSION);
        $file->move('AkunBpsProv', $namaFile);

        Excel::import(new AkunBpsProvImport, public_path("/AkunBpsProv/$namaFile"));
        return redirect()->to('/admin/daftar-bpsprov');
    }
    public function exportTemplateAkunBpsProv(){
        return response()->download(public_path("/AkunBpsProv/TemplateDaftarAkunBpsProv.xlsx"), "Template Daftar Akun BPS Provinsi.xlsx");
    }

    public function exportAkunBpsProv(){
        return Excel::download(new AkunBpsProvExport, 'BPS Provinsi.xlsx');
    }

    public function deleteAkunBpsProv($id)
    {
        $bpsprov = Instansi::find($id);
        User::where('id', $bpsprov->id_user)->delete();
        Finalisasi::where('id', $bpsprov->id_finalisasi_provinsi)->delete();
        Instansi::where('id', $id)->delete();
        return redirect()->to('/admin/daftar-bpsprov')->with('success','Data berhasil dihapus!');
    }

    public function deleteAllAkunBpsProv()
    {
        User::where('role', 'prov')->delete();
        // Mahasiswa::all()->delete();
        foreach (Instansi::all() as $instansi) {
            if($instansi->is_prov == 1){
                Finalisasi::where('id', $instansi->id_finalisasi_provinsi)->delete();
                $instansi->delete();
            }
        }
        return redirect()->to('/admin/daftar-bpsprov')->with('success','Seluruh data berhasil dihapus!');
    }

    // kelola password
    public function password()
    {
        return view('admin.password', [
            'title' => 'Profil | Admin',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }

    // public function ubah_password(Request $request, $id_user)
    // {
    //     $data = [
    //         'password' => $request->input('password_baru')
    //     ];

    //     User::where('id',$id_user)->update($data);
    //     return redirect()->to('/admin/password')->with('success', 'Berhasil mengubah password');
    // }

    public function ubah_password(Request $request, $id_user)
    {
        $user = User::find($id_user);
        $email = $request->input('email');
        $password_lama = $request->input('password_lama');
        
        // if(bcrypt($request->input('password_lama')) != $user->password){
        //     return redirect()->to('/mahasiswa/password')->with('failed', 'Password lama salah');
        // }

        // if (Auth::user()->getAuthPassword() != bcrypt($request->input('password_lama'))) {
        //     // Password benar
        // } 

        if (!Auth::attempt(['email' => $email, 'password' => $password_lama])) {
            return redirect()->to('/admin/password')->with('failed', 'Password lama salah');
        }

        $request->validate([
            'password_baru'=>['required'],
            'ulangi_password_baru'=>['required','same:password_baru']
        ], [
            'password_baru.required' => "Masukkan Password Baru",
            'ulangi_password_baru.required' => "Masukkan Konfirmasi Password",
            'ulangi_password_baru.same' => "Konfirmasi Password tidak sama dengan Password baru"
        ]);

        $data = [
            'password' => bcrypt($request->input('password_baru'))
        ];

        $user->update($data);
        return redirect()->to('/admin/password')->with('success', 'Berhasil mengubah password');
    }

    // dev only
    public function finalisasi_all_penentuan(){
        Finalisasi::whereNotNull('finalisasi_penentuan_lokasi_admin')->update(['finalisasi_penentuan_lokasi_bpsprov' => 1]);
        return redirect()->to('/admin/daftar-bpsprov');
    }
}

