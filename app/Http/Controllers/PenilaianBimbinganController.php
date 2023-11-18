<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PenilaianBimbingan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePenilaianBimbinganRequest;
use App\Http\Requests\UpdatePenilaianBimbinganRequest;

class PenilaianBimbinganController extends Controller
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
        //     $data = PenilaianBimbingan::where('id_mhs', 'like', "%$katakunci%")
        //         ->orderBy('id', 'desc')
        //         ->paginate($jumlahbaris);
        // } else {
        $data = PenilaianBimbingan::orderBy('id', 'desc')->paginate($jumlahbaris);
        // }
        return view('database.penilaian_bimbingans.index')->with('data', $data)->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.penilaian_bimbingans.create')->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianBimbinganRequest  $request
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
        $request->validate([
            'id_mhs' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
            'nilai_k5' => 'required|numeric'
        ], [
            'id_mhs' => 'Mahasiswa wajib diisi',
            'nilai_k1.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k2.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k3.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k4.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k5.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k1.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k2.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k3.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k4.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k5.numeric' => 'Nilai kriteria penilaian wajib berisi angka'
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'nilai_k1' => $request->nilai_k1,
            'nilai_k2' => $request->nilai_k2,
            'nilai_k3' => $request->nilai_k3,
            'nilai_k4' => $request->nilai_k4,
            'nilai_k5' => $request->nilai_k5,
        ];
        PenilaianBimbingan::create($data);
        return redirect()->to('penilaian_bimbingans')->with('success', 'Berhasil menambahkan nilai bimbingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenilaianBimbingan  $penilaianBimbingan
     * @return \Illuminate\Http\Response
     */
    public function show(PenilaianBimbingan $penilaianBimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenilaianBimbingan  $penilaianBimbingan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PenilaianBimbingan::where('id', $id)->first();
        return view('database.penilaian_bimbingans.edit')->with('data', $data)->with('mahasiswas', Mahasiswa::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianBimbinganRequest  $request
     * @param  \App\Models\PenilaianBimbingan  $penilaianBimbingan
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
        $request->validate([
            'id_mhs' => 'required',
            'nilai_k1' => 'required|numeric',
            'nilai_k2' => 'required|numeric',
            'nilai_k3' => 'required|numeric',
            'nilai_k4' => 'required|numeric',
            'nilai_k5' => 'required|numeric',

        ], [
            'id_mhs' => 'Mahasiswa wajib diisi',
            'nilai_k1.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k2.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k3.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k4.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k5.required' => 'Nilai kriteria penilaian wajib diisi',
            'nilai_k1.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k2.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k3.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k4.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
            'nilai_k5.numeric' => 'Nilai kriteria penilaian wajib berisi angka',
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'nilai_k1' => $request->nilai_k1,
            'nilai_k2' => $request->nilai_k2,
            'nilai_k3' => $request->nilai_k3,
            'nilai_k4' => $request->nilai_k4,
            'nilai_k5' => $request->nilai_k5,
        ];
        PenilaianBimbingan::where('id', $id)->update($data);
        return redirect()->to('penilaian_bimbingans')->with('success', 'Berhasil mengubah nilai bimbingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenilaianBimbingan  $penilaianBimbingan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenilaianBimbingan::where('id', $id)->delete();
        return redirect()->to('penilaian_bimbingans')->with('success', 'Data berhasil dihapus!');
    }
}
