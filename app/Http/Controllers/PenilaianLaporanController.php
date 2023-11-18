<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenilaianLaporan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePenilaianLaporanRequest;
use App\Http\Requests\UpdatePenilaianLaporanRequest;

class PenilaianLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        // if (strlen($katakunci)) {
        //     $data = PenilaianLaporan::where('id_mhs', 'like', "%$katakunci%")
        //         ->orderBy('id', 'desc')
        //         ->paginate($jumlahbaris);
        // } else {
        $data = PenilaianLaporan::orderBy('id', 'desc')->paginate($jumlahbaris);
        // }
        return view('database.penilaian_laporans.index')->with('data', $data)->with('penilaian_laporans', PenilaianLaporan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.penilaian_laporans.create')->with('penilaian_laporans', PenilaianLaporan::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianLaporanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_laporan', $request->id_laporan);
        Session::flash('penilai', $request->penilai);
        Session::flash('nilai_k1', $request->nilai_k1);
        Session::flash('nilai_k2', $request->nilai_k2);
        Session::flash('nilai_k3', $request->nilai_k3);
        Session::flash('nilai_k4', $request->nilai_k4);
        Session::flash('nilai_k5', $request->nilai_k5);
        Session::flash('nilai_k6', $request->nilai_k6);
        Session::flash('nilai_k7', $request->nilai_k7);
        Session::flash('nilai_k8', $request->nilai_k8);
        Session::flash('nilai_k9', $request->nilai_k9);
        Session::flash('nilai_k10', $request->nilai_k10);
        $request->validate([
            'id_laporan' => 'required',
            'penilai' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
            'nilai_k5' => 'required|numeric',
            'nilai_k6' => 'required|numeric',
            'nilai_k7' => 'required|numeric',
            'nilai_k8' => 'required|numeric',
            'nilai_k9' => 'required|numeric',
            'nilai_k10' => 'required|numeric'

        ], [
            'id_laporan' => 'Laporan wajib diisi',
            'penilai' => 'Penilai wajib diisi',
            'nilai_k1.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k2.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k3.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k4.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k5.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k6.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k7.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k8.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k9.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k10.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k1.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k2.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k3.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k4.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k5.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k6.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k7.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k8.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k9.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k10.numeric' => 'Nilai kriteria penilaian wajib berisi angka'
        ]);
        $data = [
            'id_laporan' => $request->id_laporan,
            'penilai' => $request->penilai,
            'nilai_k1' => $request->nilai_k1,
            'nilai_k2' => $request->nilai_k2,
            'nilai_k3' => $request->nilai_k3,
            'nilai_k4' => $request->nilai_k4,
            'nilai_k5' => $request->nilai_k5,
            'nilai_k6' => $request->nilai_k6,
            'nilai_k7' => $request->nilai_k7,
            'nilai_k8' => $request->nilai_k8,
            'nilai_k9' => $request->nilai_k9,
            'nilai_k10' => $request->nilai_k10
        ];
        PenilaianLaporan::create($data);
        return redirect()->to('penilaian_laporans')->with('success', 'Berhasil menambahkan nilai laporan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianLaporan  $penilaianLaporan
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianLaporan $penilaianLaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianLaporan  $penilaianLaporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PenilaianLaporan::where('id', $id)->first();
        return view('database.penilaian_laporans.edit')->with('data', $data)->with('penilaian_laporans', PenilaianLaporan::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianLaporanRequest  $request
     * @param  \App\Models\PenilaianLaporan  $penilaianLaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('id_laporan', $request->id_laporan);
        Session::flash('penilai', $request->penilai);
        Session::flash('nilai_k1', $request->nilai_k1);
        Session::flash('nilai_k2', $request->nilai_k2);
        Session::flash('nilai_k3', $request->nilai_k3);
        Session::flash('nilai_k4', $request->nilai_k4);
        Session::flash('nilai_k5', $request->nilai_k5);
        Session::flash('nilai_k6', $request->nilai_k6);
        Session::flash('nilai_k7', $request->nilai_k7);
        Session::flash('nilai_k8', $request->nilai_k8);
        Session::flash('nilai_k9', $request->nilai_k9);
        Session::flash('nilai_k10', $request->nilai_k10);
        $request->validate([
            'id_laporan' => 'required',
            'penilai' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
            'nilai_k5' => 'required|numeric',
            'nilai_k6' => 'required|numeric',
            'nilai_k7' => 'required|numeric',
            'nilai_k8' => 'required|numeric',
            'nilai_k9' => 'required|numeric',
            'nilai_k10' => 'required|numeric'

        ], [
            'id_laporan' => 'Laporan wajib diisi',
            'penilai' => 'Penilai wajib diisi',
            'nilai_k1.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k2.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k3.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k4.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k5.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k6.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k7.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k8.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k9.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k10.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k1.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k2.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k3.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k4.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k5.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k6.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k7.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k8.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k9.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k10.numeric' => 'Nilai kriteria penilaian wajib berisi angka'
        ]);
        $data = [
            'id_laporan' => $request->id_laporan,
            'penilai' => $request->penilai,
            'nilai_k1' => $request->nilai_k1,
            'nilai_k2' => $request->nilai_k2,
            'nilai_k3' => $request->nilai_k3,
            'nilai_k4' => $request->nilai_k4,
            'nilai_k5' => $request->nilai_k5,
            'nilai_k6' => $request->nilai_k6,
            'nilai_k7' => $request->nilai_k7,
            'nilai_k8' => $request->nilai_k8,
            'nilai_k9' => $request->nilai_k9,
            'nilai_k10' => $request->nilai_k10
        ];
        PenilaianLaporan::where('id', $id)->update($data);
        return redirect()->to('penilaian_laporans')->with('success', 'Berhasil mengubah nilai laporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianLaporan  $penilaianLaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenilaianLaporan::where('id', $id)->delete();
        return redirect()->to('penilaian_laporans')->with('success', 'Data berhasil dihapus!');
    }
}
