<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Finalisasi;
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
            'pemilihan_lokasis' => PemilihanLokasi::all()
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
            'id_instansi' => $pemilihan_lokasi->id_instansi_ajuan
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        return redirect()->to('/bps-provinsi/approvalmahasiswa');
    }

    public function tolakPemilihan(Request $request, $id)
    {

        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();
        $data = [
            'id_instansi' => $request->input('id_pengalihan') ? $request->input('id_pengalihan') : null
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        
        return view('BPS-Provinsi.tolak-pemilihan', ['pemilihan_lokasis' => PemilihanLokasi::all(),'instansis' => Instansi::all(),'pemilihan_lokasi' => $pemilihan_lokasi]);

    }

    public function updateApprovalMahasiswa(Request $request, $id)
    {
        $pemilihan_lokasi = PemilihanLokasi::findOrFail($id);
        $pemilihan_lokasi = PemilihanLokasi::where('id', $id)->first();

        // Lakukan validasi atau operasi lain sesuai kebutuhan

        $pemilihan_lokasi->id_pengalihan = $request->input('id_pengalihan');
        $pemilihan_lokasi->keterangan = $request->input('keterangan');
         $data = [
            'id_instansi' => $request->input('id_pengalihan') ? $request->input('id_pengalihan') : null
        ];
        $pemilihan_lokasi->mahasiswa->update($data);
        $pemilihan_lokasi->save();

        return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('success', 'Data berhasil diperbarui.');
    }

    public function do_finalisasi_pemilihan()
    {

        $pemilihan_lokasis = PemilihanLokasi::get();

        foreach ($pemilihan_lokasis as $pemilihan_lokasi) {
            $id_instansi = $pemilihan_lokasi->mahasiswa->id_instansi;

            if ($id_instansi == NULL) {
                return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('failed', 'Terdapat mahasiswa yang belum diberi keputusan');
            }
        }
        Finalisasi::create([
            'finalisasi_pemilihan_lokasi_bpsprov' => 1
        ]);

        return redirect()->to('/bps-provinsi/approvalmahasiswa')->with('success', 'Berhasil finalisasi');
    }
  
}
