<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data=Penilaian::where('id_mhs','like',"%$katakunci%")
                    ->orWhere('nilai_laporan_dospem','like',"%$katakunci%")
                    ->orWhere('nilai_laporan_pemlap','like',"%$katakunci%")
                    ->orWhere('nilai_kinerja','like',"%$katakunci%")
                    ->orWhere('nilai_bimbingan','like',"%$katakunci%")
                    ->orWhere('nilai_akhir','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = Penilaian::orderBy('id','desc')->paginate($jumlahbaris);
        }
    
        return view('database.penilaians.index')->with('data',$data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.penilaians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('nilai_laporan_dospem', $request->nilai_laporan_dospem);
        Session::flash('nilai_laporan_pemlap', $request->nilai_laporan_pemlap);
        Session::flash('nilai_kinerja', $request->nilai_kinerja);
        Session::flash('nilai_bimbingan', $request->nilai_bimbingan);
        Session::flash('nilai_akhir', $request->nilai_akhir);
        
        $request->validate(Penilaian::$rules);
        $request->validate([
            'id_mhs' => 'required',
            'nilai_laporan_dospem' => 'required',
            'nilai_laporan_pemlap' => 'required',
            'nilai_kinerja' => 'required',
            'nilai_bimbingan' => 'required',
            'nilai_akhir' => 'required',
        ],[
            'id_mhs.required' =>'ID Mahasiswa wajib diisi',
            'nilai_laporan_dospem.required'=> 'Nilai Laporan Dospem wajib diisi',
            'nilai_laporan_pemlap.required' => 'Nilai Laporan Pemlap wajib diisi',
            'nilai_kinerja.required'=> 'Nilai Kinerja wajib diisi',
            'nilai_bimbingan.required'=> 'Nilai Bimbingan wajib diisi',
            'nilai_akhir.required'=> 'Nilai Akhir wajib diisi',
            
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'nilai_laporan_dospem' => $request->nilai_laporan_dospem,
            'nilai_laporan_pemlap' => $request->nilai_laporan_pemlap,
            'nilai_kinerja' => $request->nilai_kinerja,
            'nilai_bimbingan' => $request->nilai_bimbingan,
            'nilai_akhir' => $request->nilai_akhir,
        ];
        Penilaian::create($data);
        return redirect()->to('penilaians')->with('success','Berhasi menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = Penilaian::where('id',$id)->first();
        return view('database.penilaians.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenilaianRequest  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function  update(Request $request, string $id)
    {
        $request->validate([
            'nilai_laporan_dospem' => 'required',
            'nilai_laporan_pemlap' => 'required',
            'nilai_kinerja' => 'required',
            'nilai_bimbingan' => 'required',
            'nilai_akhir' => 'required',
        ],[
            'nilai_laporan_dospem.required'=> 'Nilai Laporan Dospem wajib diisi',
            'nilai_laporan_pemlap.required' => 'Nilai Laporan Pemlap wajib diisi',
            'nilai_kinerja.required'=> 'Nilai Kinerja wajib diisi',
            'nilai_bimbingan.required'=> 'Nilai Bimbingan wajib diisi',
            'nilai_akhir.required'=> 'Nilai Akhir wajib diisi',
            
        ]);
        $data = [
            //'id_mhs' => $request->id_mhs,
            'nilai_laporan_dospem' => $request->nilai_laporan_dospem,
            'nilai_laporan_pemlap' => $request->nilai_laporan_pemlap,
            'nilai_kinerja' => $request->nilai_kinerja,
            'nilai_bimbingan' => $request->nilai_bimbingan,
            'nilai_akhir' => $request->nilai_akhir,
        ];
        Penilaian::where('id',$id)->update($data);
        return redirect()->to('penilaians')->with('success','Berhasi melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        Penilaian::where('id',$id)->delete();
        return redirect()->to('penilaians')->with('success','Berhasil melakukan delete data');
    }
}
