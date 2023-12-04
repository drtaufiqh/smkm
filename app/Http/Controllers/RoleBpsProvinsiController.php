<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KabKota;
use App\Models\Instansi;
use App\Models\Kecamatan;
use App\Models\Mahasiswa;
use App\Models\Finalisasi;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RoleBpsProvinsiController extends Controller
{
    public function approvalMahasiswa($provId)
    {
        $pemilihan_lokasis = PemilihanLokasi::select('pemilihan_lokasis.*')
        ->join('instansis','id_instansi_ajuan', '=', 'instansis.id')
        ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        ->where('kab_kotas.id_prov', 'LIKE', $provId)
        ->get();
        return view('bps-provinsi.approvalmahasiswa', [
            'title' => 'Approval Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'approval',
            'pemilihan_lokasis' => $pemilihan_lokasis,
            'instansis' => Instansi::all()
        ]);
    }

    public function bandingMahasiswa($provId)
    {
        $pemilihan_lokasis = PemilihanLokasi::select('pemilihan_lokasis.*')
        ->join('instansis','id_instansi_ajuan', '=', 'instansis.id')
        ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        ->where('kab_kotas.id_prov', 'LIKE', $provId)
        ->where('admin_setuju_banding','=',1)
        ->get();
        return view('bps-provinsi.bandingmahasiswa', [
            'title' => 'Banding Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'banding',
            'pemilihan_lokasis' => $pemilihan_lokasis
            // 'pemilihan_lokasis' => PemilihanLokasi::where('admin_setuju_banding', 1)->get()
            // 'pemilihan_lokasis' => PemilihanLokasi::whereHas('mahasiswa', function ($query) {
            //     $query->whereRaw('mahasiswas.id_instansi = pemilihan_lokasis.id_instansi_banding');
            // })->get()
        ]);
    }

    public function dashboard()
    {
        $instansi = Instansi::where('id_user', Auth::user()->id)->first();
        // $pemilihan_lokasis = PemilihanLokasi::join('instansis', 'pemilihan_lokasis.id_instansi_ajuan', '=', 'instansis.id')
        //                         ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        //                         ->join('provinsis', 'kab_kotas.id_prov', '=', 'provinsis.id')
        //                         ->where('provinsis.id', $instansi->kabKota->provinsi->id);
        // // dd($pemilihan_lokasis->get()->count());
        //                         // ->select('pemilihan_lokasis.*')
        //                         // ->get();

        // $pengajuan = PemilihanLokasi::join('instansis', 'pemilihan_lokasis.id_instansi_ajuan', '=', 'instansis.id')
        //                         ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        //                         ->join('provinsis', 'kab_kotas.id_prov', '=', 'provinsis.id')
        //                         ->where('provinsis.id', $instansi->kabKota->provinsi->id)
        //                         ->whereNotNull('pemilihan_lokasis.id_pilihan_1');
        // $banding = PemilihanLokasi::join('instansis', 'pemilihan_lokasis.id_instansi_ajuan', '=', 'instansis.id')
        //                         ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        //                         ->join('provinsis', 'kab_kotas.id_prov', '=', 'provinsis.id')
        //                         ->where('provinsis.id', $instansi->kabKota->provinsi->id)
        //                         ->whereNotNull('pemilihan_lokasis.id_instansi_banding');
        // $approval = PemilihanLokasi::join('instansis', 'pemilihan_lokasis.id_instansi_ajuan', '=', 'instansis.id')
        //                         ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        //                         ->join('provinsis', 'kab_kotas.id_prov', '=', 'provinsis.id')
        //                         ->where('provinsis.id', $instansi->kabKota->provinsi->id)
        //                         ->whereNotNull('pemilihan_lokasis.id_pilihan_1')->whereColumn('pemilihan_lokasis.id_instansi', '=', 'id_instansi_ajuan');
        // $notApproval = PemilihanLokasi::join('instansis', 'pemilihan_lokasis.id_instansi_ajuan', '=', 'instansis.id')
        //                         ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        //                         ->join('provinsis', 'kab_kotas.id_prov', '=', 'provinsis.id')
        //                         ->where('provinsis.id', $instansi->kabKota->provinsi->id)
        //                         ->whereNotNull('pemilihan_lokasis.id_pilihan_1')->whereColumn('pemilihan_lokasis.id_instansi', '!=', 'id_instansi_ajuan');

        $userId = $instansi->kabKota->provinsi->id;
        $pengajuan = PemilihanLokasi::whereHas('instansiAjuan.kabKota.provinsi', function ($query) use ($userId) {
                                            $query->where('id', $userId);
                                        })->whereNotNull('pemilihan_lokasis.id_pilihan_1')
                                        ->get();
        $banding = PemilihanLokasi::whereHas('instansiAjuan.kabKota.provinsi', function ($query) use ($userId) {
                                            $query->where('id', $userId);
                                        })->whereNotNull('id_instansi_banding')
                                        ->get();
        $approval = PemilihanLokasi::whereHas('instansiAjuan.kabKota.provinsi', function ($query) use ($userId) {
                                            $query->where('id', $userId);
                                        })->whereNotNull('id_pilihan_1')
                                        ->whereColumn('id_instansi', '=', 'id_instansi_ajuan')
                                        ->get();
        $notApproval = PemilihanLokasi::whereHas('instansiAjuan.kabKota.provinsi', function ($query) use ($userId) {
                                            $query->where('id', $userId);
                                        })->whereNotNull('id_pilihan_1')
                                        ->whereColumn('id_instansi', '!=', 'id_instansi_ajuan')
                                        ->get();

        $totalPengajuan = $pengajuan->count();
        $totalBanding = $banding->count();
        $totalApproval = $approval->count();
        $belumApproval = $notApproval->count();

        return view('bps-provinsi.dashboard', [
            'title' => 'Dashboard | BPS Provinsi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'pengajuan' => $pengajuan,
            'banding' => $banding,
            'approval' => $approval,
            'notApproval' => $notApproval,
            'totalPengajuan' => $totalPengajuan,
            'totalBanding' => $totalBanding,
            'totalApproval' => $totalApproval,
            'belumApproval' => $belumApproval,
            'pemilihan_lokasis' => PemilihanLokasi::all(),
        ]);
    }

    public function profil()
    {
        return view('bps-provinsi.profil', [
            'title' => 'Profil | BPS Provinsi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }

    public function password()
    {
        return view('bps-provinsi.password', [
            'title' => 'Profil | BPS Provinsi',
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
    //     return redirect()->to('/bps-provinsi/password')->with('success', 'Berhasil mengubah password');
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
            return redirect()->to('/bps-provinsi/password')->with('failed', 'Password lama salah');
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
        return redirect()->to('/bps-provinsi/password')->with('success', 'Berhasil mengubah password');
    }

    public function setujuiPemilihan($id, $provId)
    {
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $data = [
            'id_instansi' => $pemilihan_lokasi->id_instansi_ajuan,
            'id_pengalihan' => null,
            'keterangan' => null
        ];
        $pemilihan_lokasi->mahasiswa->update(['id_instansi' => $pemilihan_lokasi->id_instansi_ajuan]);
        $pemilihan_lokasi->update($data);
        
        
        return redirect()->to('/bps-provinsi/approvalmahasiswa/'.$provId)->with('success', 'Lokasi mahasiswa berhasil disetujui.');
    }

    public function do_keputusanbanding($id, $lokasi_banding, $action)
    {
        // Dapatkan data pemilihan lokasi berdasarkan ID
        $pemilihan_lokasi = PemilihanLokasi::find($id);

        if ($pemilihan_lokasi) {
            // Tentukan tindakan berdasarkan parameter $action
            if ($action == 'setujui') {
                // Lakukan pembaruan pada tabel mahasiswa berdasarkan id_instansi banding
                $pemilihan_lokasi->mahasiswa->update(['id_instansi' => $lokasi_banding]);
            } elseif ($action == 'tidaksetujui') {
                // Lakukan pembaruan pada tabel mahasiswa berdasarkan id_instansi pada tabel pemilihan lokasi
                $pemilihan_lokasi->mahasiswa->update(['id_instansi' => $pemilihan_lokasi->id_instansi]);
            }
            return redirect()->to('/bps-provinsi/bandingmahasiswa');
        } else {
            return redirect()->to('/bps-provinsi/bandingmahasiswa');
        }
    }

    public function do_finalisasi_banding()
    {
        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi = $pemilihan_lokasi->mahasiswa->id_instansi;

            if (!$id_instansi) {
                if($pemilihan_lokasi->admin_setuju_banding){
                    return redirect()->to('/bps-provinsi/bandingmahasiswa')->with('failed', 'Terdapat mahasiswa yang belum diberi keputusan');
                }
            }
        }

        $finalisasis = Finalisasi::get();
        foreach ($finalisasis as $finalisasi) {

            $finalisasi->update(['finalisasi_banding_lokasi_bpsprov' => 1]);
        }
        return redirect()->to('/bps-provinsi/bandingmahasiswa')->with('success', 'Berhasil Finalisasi');
    }

    // public function do_finalisasi_banding()
    public function tolakPemilihan(Request $request, $id, $provId)
    {

        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $data = [
            'id_instansi' => $request->input('id_pengalihan') ? $request->input('id_pengalihan') : null
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        $pemilihan_lokasi->update($data);
        // $id_prov = Auth::User()->info()->Kabkota->Prov->id;
        $instansis = Instansi::select('instansis.*')
        // ->join('kecamatans', 'instansis.id_kecamatan', '=', 'kecamatans.id')
        ->join('kab_kotas', 'instansis.id_kab_kota', '=', 'kab_kotas.id')
        ->where('kab_kotas.id_prov', 'LIKE', $provId)
        ->get();

        
        return view('BPS-Provinsi.tolak-pemilihan', ['pemilihan_lokasis' => PemilihanLokasi::all(),'instansis' => $instansis,'pemilihan_lokasi' => $pemilihan_lokasi]);
        // return redirect()->to('/bps-provinsi/approvalmahasiswa/'.$provId);

    }

    public function updateApprovalMahasiswa(Request $request, $id, $provId)
    {
        // $pemilihan_lokasi = PemilihanLokasi::findOrFail($id);
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();

        // Lakukan validasi atau operasi lain sesuai kebutuhan
        $request->validate([
            'id_pengalihan' =>'required'
        ], [
            'id_pengalihan.required' => 'BPS Pengalihan wajib diisi.'
        ]);

        $pemilihan_lokasi->id_pengalihan = $request->input('id_pengalihan');
        $pemilihan_lokasi->keterangan = $request->input('keterangan');
        $data = [
            'id_instansi' => $request->input('id_pengalihan') ? $request->input('id_pengalihan') : null
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        $pemilihan_lokasi->update($data);
        $pemilihan_lokasi->save();

        return redirect()->to('/bps-provinsi/approvalmahasiswa/'.$provId)->with('success', 'Lokasi mahasiswa berhasil dialihkan.');
        // return redirect()->to('/bps-provinsi/approvalmahasiswa/'.$provId);

    }

    public function do_finalisasi_pemilihan()
    {

        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi = $pemilihan_lokasi->id_instansi;

            if ($id_instansi == NULL) {
                return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('failed', 'Terdapat mahasiswa yang belum diberi keputusan');
            }
        }
        // Finalisasi::create([
        //     'finalisasi_penentuan_lokasi_bpsprov' => 1
        // ]);

        // $finalisasis = Finalisasi::all();
        // foreach ($finalisasis as $finalisasi) {
        //     $finalisasi->update(['finalisasi_penentuan_lokasi_bpsprov' => 1]);
        // }

        $finalisasi = Finalisasi::first();
        $finalisasi->update(['finalisasi_penentuan_lokasi_bpsprov' => 1]);

        return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('success', 'Berhasil finalisasi');
    }
}
