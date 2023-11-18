<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\JurnalingBulanan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJurnalingBulananRequest;
use App\Http\Requests\UpdateJurnalingBulananRequest;
use App\Models\PembimbingLapangan;

class JurnalingBulananController extends Controller
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
        if (strlen($katakunci)) {
            $data = JurnalingBulanan::where('uraian_kegiatan', 'like', '%' . $katakunci . '%')
                    ->orWhere('id', 'like', "%$katakunci%")
                    ->orWhere('satuan', 'like', "%$katakunci%")
                    ->orWhere('kuantitas_target', 'like', "%$katakunci%")
                    ->orWhere('kuantitas_realisasi', 'like', "%$katakunci%")
                    ->orWhere('tingkat_kuantitas', 'like', "%$katakunci%")
                    ->orWhere('tingkat_kualitas', 'like', "%$katakunci%")
                    ->orWhere('keterangan', 'like', "%$katakunci%")

                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = JurnalingBulanan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.jurnaling_bulanans.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.jurnaling_bulanans.create')->with('mahasiswas', Mahasiswa::all())->with('pembimbing_lapangans', PembimbingLapangan::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJurnalingBulananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('id_penilai', $request->id_penilai);
        Session::flash('periode', $request->periode);
        Session::flash('uraian_kegiatan', $request->uraian_kegiatan);
        Session::flash('satuan', $request->satuan);
        Session::flash('kuantitas_target', $request->kuantitas_target);
        Session::flash('kuantitas_realisasi', $request->kuantitas_realisasi);
        Session::flash('tingkat_kuantitas', $request->tingkat_kuantitas);
        Session::flash('tingkat_kualitas', $request->tingkat_kualitas);
        Session::flash('keterangan', $request->keterangan);

        $request->validate([
            'periode' => 'required',
            'uraian_kegiatan' => ['required'],
            'satuan' => ['required'],
            'kuantitas_target' => ['required'],
            'kuantitas_realisasi' => ['required']
        ],[
            'periode.required'=>"periode harus diisi",
            'uraian_kegiatan.required'=>"Uraian kegiatan harus diisi",
            'satuan.required'=>"Satuan harus diisi",
            'kuantitas_target.required'=>"Kuantitas target harus diisi",
            'kuantitas_realisasi.required'=>"Kuantitas realisasi harus diisi",

            
        ]);

        $data = [
            // 'id_mhs' => 5, //nanti ambil dari mahasiswa terkait (bukan input)
            // 'id_penilai' => 5, //ini juga ambil dari database
            'id_mhs' => $request->input('id_mhs'), //nanti ambil dari mahasiswa terkait (bukan input)
            'id_penilai' => $request->input('id_penilai'), //ini juga ambil dari database
            // 'id' => $request->input('id'),
            'periode' => $request->input('periode'),
            'uraian_kegiatan' => $request->input('uraian_kegiatan'),
            'satuan' => $request->input('satuan'),
            'kuantitas_target' => $request->input('kuantitas_target'),
            'kuantitas_realisasi' => $request->input('kuantitas_realisasi'),
            'tingkat_kuantitas' => $request->input('tingkat_kuantitas'),
            'tingkat_kualitas' => $request->input('tingkat_kualitas'),
            'keterangan' => $request->input('keterangan'),
            'status_final_mhs' => $request->input('status_final_mhs'),
            'status_final_penilai' => $request->input('status_final_penilai'),
        ];

        JurnalingBulanan::create($data);
        return redirect()->to('/admin/jurnaling_bulanans')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JurnalingBulanan  $jurnalingBulanan
     * @return \Illuminate\Http\Response
     */
    public function show(JurnalingBulanan $jurnalingBulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JurnalingBulanan  $jurnalingBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JurnalingBulanan::where('id', $id)->first();
        return view('database.jurnaling_bulanans.edit')->with('data', $data)->with('mahasiswas', Mahasiswa::all())->with('pembimbing_lapangans', PembimbingLapangan::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJurnalingBulananRequest  $request
     * @param  \App\Models\JurnalingBulanan  $jurnalingBulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
      
        // Session::flash('id', $request->id);
        // Session::flash('id_mhs', $request->id_mhs);
        // Session::flash('id_penilai', $request->id_penilai);
        // Session::flash('periode', $request->periode);
        // Session::flash('uraian_kegiatan', $request->uraian_kegiatan);
        // Session::flash('satuan', $request->satuan);
        // Session::flash('kuantitas_target', $request->kuantitas_target);
        // Session::flash('kuantitas_realisasi', $request->kuantitas_realisasi);
        // Session::flash('tingkat_kuantitas', $request->tingkat_kuantitas);
        // Session::flash('tingkat_kualitas', $request->tingkat_kualitas);
        // Session::flash('keterangan', $request->keterangan);

        $request->validate([
            'periode' => 'required',
            'uraian_kegiatan' => ['required'],
            'satuan' => ['required'],
            'kuantitas_target' => ['required'],
            'kuantitas_realisasi' => ['required']
        ],[
            'periode.required'=>"periode harus diisi",
            'uraian_kegiatan.required'=>"Uraian kegiatan harus diisi",
            'satuan.required'=>"Satuan harus diisi",
            'kuantitas_target.required'=>"Kuantitas target harus diisi",
            'kuantitas_realisasi.required'=>"Kuantitas realisasi harus diisi",

            
        ]);

        $data = [
            // 'id_mhs' => 5, //nanti ambil dari mahasiswa terkait (bukan input)
            // 'id_penilai' => 5, //ini juga ambil dari database
            'id_mhs' => $request->input('id_mhs'), //nanti ambil dari mahasiswa terkait (bukan input)
            'id_penilai' => $request->input('id_penilai'), //ini juga ambil dari database
            // 'id' => $request->input('id'),
            'periode' => $request->input('periode'),
            'uraian_kegiatan' => $request->input('uraian_kegiatan'),
            'satuan' => $request->input('satuan'),
            'kuantitas_target' => $request->input('kuantitas_target'),
            'kuantitas_realisasi' => $request->input('kuantitas_realisasi'),
            'tingkat_kuantitas' => $request->input('tingkat_kuantitas'),
            'tingkat_kualitas' => $request->input('tingkat_kualitas'),
            'keterangan' => $request->input('keterangan'),
            'status_final_mhs' => $request->input('status_final_mhs'),
            'status_final_penilai' => $request->input('status_final_penilai'),
        ];

        JurnalingBulanan::where('id', $id)->update($data);
        return redirect()->to('/admin/jurnaling_bulanans')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JurnalingBulanan  $jurnalingBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        JurnalingBulanan::where('id', $id)->delete();
        return redirect()->to('/admin/jurnaling_bulanans')->with('success','Data berhasil dihapus!');
    }
}