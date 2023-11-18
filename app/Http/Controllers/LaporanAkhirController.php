<?php

namespace App\Http\Controllers;

use App\Models\LaporanAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreLaporanAkhirRequest;
use App\Http\Requests\UpdateLaporanAkhirRequest;

class LaporanAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data=LaporanAkhir::where('id_mhs','like',"%$katakunci%")
                    ->orWhere('laporan_awal','like',"%$katakunci%")
                    ->orWhere('komentar_pemlap','like',"%$katakunci%")
                    ->orWhere('nilai_akhir_pemlap','like',"%$katakunci%")
                    ->orWhere('nilai_akhir_dospem','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = LaporanAkhir::orderBy('id','desc')->paginate($jumlahbaris);
        }
    
        return view('database.laporan_akhirs.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.laporan_akhirs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLaporanAkhirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(LaporanAkhir::$rules);
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('laporan_awal', $request->laporan_awal);
        Session::flash('komentar_pemlap', $request->komentar_pemlap);
        Session::flash('approval_awal_pemlap', $request->approval_awal_pemlap);
        Session::flash('approval_awal_dospem', $request->approval_awal_dospem);
        Session::flash('laporan_final', $request->laporan_final);
        Session::flash('approval_akhir_pemlap', $request->approval_akhir_pemlap);
        Session::flash('approval_akhir_dospem', $request->approval_akhir_dospem);
        Session::flash('approval_akhir_kampus', $request->approval_akhir_kampus);
        Session::flash('nilai_akhir_pemlap', $request->nilai_akhir_pemlap);
        Session::flash('nilai_akhir_dospem', $request->nilai_akhir_dospem);
        
        $request->validate([
            'id_mhs' => 'required',
            'laporan_awal' => 'required',
            'komentar_pemlap' => 'required',
            'approval_awal_pemlap' => 'required',
            'approval_awal_dospem' => 'required',
            'laporan_final' => 'required',
            'approval_akhir_pemlap' => 'required',
            'approval_akhir_dospem' => 'required',
            'approval_akhir_kampus' => 'required',
            'nilai_akhir_pemlap' => 'required',
            'nilai_akhir_dospem' => 'required',
        ],[
            'id_mhs.required' =>'ID Mahasiswa wajib diisi',
            'laporan_awal.required' => 'Laporan Awal wajib diisi',
            'komentar_pemlap.required' => 'Komentar Pemlap wajib diisi',
            'approval_awal_pemlap.required' => 'Approval Awal Pemlap wajib diisi',
            'approval_awal_dospem.required' => 'Approval Awal Dosen Pembimbing wajib diisi',
            'laporan_final.required' => 'Laporan Final wajib diisi',
            'approval_akhir_pemlap.required' => 'Approval Akhir Pemlap wajib diisi',
            'approval_akhir_dospem.required' => 'Approval Akhir Dosen Pembimbing wajib diisi',
            'approval_akhir_kampus.required' => 'Approval Akhir Kampus Pembimbing wajib diisi',
            'nilai_akhir_pemlap.required' => 'Nilai Akhir Pemlap wajib diisi',
            'nilai_akhir_dospem.required' => 'Nilai Akhir Dosen Pembimbing wajib diisi',
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'laporan_awal' => $request->laporan_awal,
            'komentar_pemlap' => $request->komentar_pemlap,
            'approval_awal_pemlap' => $request->approval_awal_pemlap,
            'approval_awal_dospem' => $request->approval_awal_dospem,
            'laporan_final' => $request->laporan_final,
            'approval_akhir_pemlap' => $request->approval_akhir_pemlap,
            'approval_akhir_dospem' => $request->approval_akhir_dospem,
            'approval_akhir_kampus' => $request->approval_akhir_kampus,
            'nilai_akhir_pemlap' => $request->nilai_akhir_pemlap,
            'nilai_akhir_dospem' => $request->nilai_akhir_dospem,
        ];
        LaporanAkhir::create($data);
        return redirect()->to('laporan_akhirs')->with('success','Berhasi menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanAkhir $laporanAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = LaporanAkhir::where('id',$id)->first();
        return view('database.laporan_akhirs.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanAkhirRequest  $request
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'laporan_awal' => 'required',
            'komentar_pemlap' => 'required',
            'approval_awal_pemlap' => 'required',
            'approval_awal_dospem' => 'required',
            'laporan_final' => 'required',
            'approval_akhir_pemlap' => 'required',
            'approval_akhir_dospem' => 'required',
            'approval_akhir_kampus' => 'required',
            'nilai_akhir_pemlap' => 'required',
            'nilai_akhir_dospem' => 'required',
        ],[
            'laporan_awal.required' => 'Laporan Awal wajib diisi',
            'komentar_pemlap.required' => 'Komentar Pemlap wajib diisi',
            'approval_awal_pemlap' => 'Approval Awal Pemlap wajib diisi',
            'approval_awal_dospem' => 'Approval Awal Dospem wajib diisi',
            'laporan_final.required' => 'Laporan Final wajib diisi',
            'approval_akhir_pemlap' => 'Approval Akhir Pemlap wajib diisi',
            'approval_akhir_dospem' => 'Approval Awal Dospem wajib diisi',
            'approval_akhir_kampus' => 'Approval Awal Kampus wajib diisi',
            'nilai_akhir_pemlap.required' => 'Nilai Akhir Pemlap wajib diisi',
            'nilai_akhir_dospem.required' => 'Nilai Akhir Dosen Pembimbing wajib diisi',
        ]);
        $data = [
            //'id_mhs' => $request->id_mhs,
            'laporan_awal' => $request->laporan_awal,
            'komentar_pemlap' => $request->komentar_pemlap,
            'approval_awal_pemlap' => $request->approval_awal_pemlap,
            'approval_awal_dospem' => $request->approval_awal_dospem,
            'laporan_final' => $request->laporan_final,
            'approval_akhir_pemlap' => $request->approval_akhir_pemlap,
            'approval_akhir_dospem' => $request->approval_akhir_dospem,
            'approval_akhir_kampus' => $request->approval_akhir_kampus,
            'nilai_akhir_pemlap' => $request->nilai_akhir_pemlap,
            'nilai_akhir_dospem' => $request->nilai_akhir_dospem,
        ];
        LaporanAkhir::where('id',$id)->update($data);
        return redirect()->to('laporan_akhirs')->with('success','Berhasi melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        LaporanAkhir::where('id',$id)->delete();
        return redirect()->to('laporan_akhirs')->with('success','Berhasil melakukan delete data');
    }
}
