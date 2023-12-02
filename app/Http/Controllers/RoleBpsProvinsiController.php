<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Kecamatan;
use App\Models\KabKota;
use App\Models\Finalisasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;


class RoleBpsProvinsiController extends Controller
{
    public function approvalMahasiswa()
    {
        return view('bps-provinsi.approvalmahasiswa', [
            'title' => 'Approval Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'approval',
            'pemilihan_lokasis' => PemilihanLokasi::all(),
            'instansis' => Instansi::all()
        ]);
    }

    public function bandingMahasiswa()
    {
        return view('bps-provinsi.bandingmahasiswa', [
            'title' => 'Banding Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'banding',
            'pemilihan_lokasis' => PemilihanLokasi::where('admin_setuju_banding', 1)->get()
            // 'pemilihan_lokasis' => PemilihanLokasi::whereHas('mahasiswa', function ($query) {
            //     $query->whereRaw('mahasiswas.id_instansi = pemilihan_lokasis.id_instansi_banding');
            // })->get()
        ]);
    }

    public function dashboard()
    {
        $mhs1 = PemilihanLokasi::all();
        $mhs2 = PemilihanLokasi::whereNotNull('id_instansi_banding')->get();
        $mhs3 = PemilihanLokasi::whereNotNull('id_instansi')->get();
        $mhs4 = PemilihanLokasi::whereNull('id_instansi')->get();

        $mhs1Count = $mhs1->count();
        $mhs2Count = $mhs2->count();
        $mhs3Count = $mhs3->count();
        $mhs4Count = $mhs4->count();

        return view('bps-provinsi.dashboard', [
            'title' => 'Dashboard | BPS Provinsi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => '',
            'mhs1' => $mhs1,
            'mhs2' => $mhs2,
            'mhs3' => $mhs3,
            'mhs4' => $mhs4,
            'mhs1Count' => $mhs1Count,
            'mhs2Count' => $mhs2Count,
            'mhs3Count' => $mhs3Count,
            'mhs4Count' => $mhs4Count,
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

    public function setujuiPemilihan($id)
    {
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $data = [
            'id_instansi' => $pemilihan_lokasi->id_instansi_ajuan,
            'id_pengalihan' => null,
            'keterangan' => null
        ];
        $pemilihan_lokasi->mahasiswa->update(['id_instansi' => $pemilihan_lokasi->id_instansi_ajuan]);
        $pemilihan_lokasi->update($data);
        return redirect()->to('/bps-provinsi/approvalmahasiswa');
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

    }

    public function updateApprovalMahasiswa(Request $request, $id)
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

        return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('success', 'Data berhasil diperbarui.');
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
