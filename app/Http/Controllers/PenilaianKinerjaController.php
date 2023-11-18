<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PenilaianKinerja;
use App\Models\PembimbingLapangan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePenilaianKinerjaRequest;
use App\Http\Requests\UpdatePenilaianKinerjaRequest;

class PenilaianKinerjaController extends Controller
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
        //     $data = PenilaianKinerja::where('id_mhs', 'like', "%$katakunci%")
        //         ->orderBy('id', 'desc')
        //         ->paginate($jumlahbaris);
        // } else {
        $data = PenilaianKinerja::orderBy('id', 'desc')->paginate($jumlahbaris);
        // }
        return view('database.penilaian_kinerjas.index')->with('data', $data)->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.penilaian_kinerjas.create')->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianKinerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('id_mhs', $request->id_mhs);
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
            'id_mhs' => 'required',
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
            'id_mhs' => 'Mahasiswa wajib diisi',
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
            'id_mhs' => $request->id_mhs,
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
        PenilaianKinerja::create($data);
        return redirect()->to('/admin/penilaian_kinerjas')->with('success', 'Berhasil menambahkan nilai kinerja');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianKinerja  $penilaianKinerja
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianKinerja $penilaianKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianKinerja  $penilaianKinerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PenilaianKinerja::where('id', $id)->first();
        return view('database.penilaian_kinerjas.edit')->with('data', $data)->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianKinerjaRequest  $request
     * @param  \App\Models\PenilaianKinerja  $penilaianKinerja
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        Session::flash('id', $request->id);
        Session::flash('id_mhs', $request->id_mhs);
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
            'id_mhs' => 'required',
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
            'id_mhs' => 'Mahasiswa wajib diisi',
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
            'id_mhs' => $request->id_mhs,
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
        PenilaianKinerja::where('id', $id)->update($data);
        return redirect()->to('/admin/penilaian_kinerjas')->with('success', 'Berhasil mengubah nilai kinerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianKinerja  $penilaianKinerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenilaianKinerja::where('id', $id)->delete();
        return redirect()->to('/admin/penilaian_kinerjas')->with('success', 'Data berhasil dihapus!');
    }
}
