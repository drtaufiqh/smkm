<?php

namespace App\Http\Controllers;

use id;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\JurnalingHarian;
use App\Models\PembimbingLapangan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJurnalingHarianRequest;
use App\Http\Requests\UpdateJurnalingHarianRequest;

class JurnalingHarianController extends Controller
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
            $data = JurnalingHarian::where('deskripsi_pekerjaan', 'like', "%$katakunci%")
                ->orWhere('pemberi_tugas', 'like', "%$katakunci%")
                ->orderBy('id', 'desc')
                ->paginate($jumlahbaris);
        } else {
            $data = JurnalingHarian::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.jurnaling_harians.index')->with('data', $data)->with('mahasiswas', Mahasiswa::all())->with('pembimbing_lapangans', PembimbingLapangan::all())->with('jurnaling_harians', JurnalingHarian::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.jurnaling_harians.create')->with('mahasiswas', Mahasiswa::all())->with('pembimbing_lapangans', PembimbingLapangan::all())->with('jurnaling_harians', JurnalingHarian::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('id_penilai', $request->id_penilai);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('deskripsi_pekerjaan', $request->deskripsi_pekerjaan);
        Session::flash('kuantitas_volume', $request->kuantitas_volume);
        Session::flash('kuantitas_satuan', $request->kuantitas_satuan);
        Session::flash('durasi_waktu', $request->durasi_waktu);
        Session::flash('pemberi_tugas', $request->pemberi_tugas);
        Session::flash('status_penyelesaian', $request->status_penyelesaian);
        Session::flash('status_final_mhs', $request->status_final_mhs);
        Session::flash('status_final_penilai', $request->status_final_mhs);
        $request->validate([
            'id_mhs' => 'required',
            'id_penilai' => 'required',
            'tanggal' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'kuantitas_volume' => 'required|numeric',
            'kuantitas_satuan' => 'required',
            'durasi_waktu' => 'required',
            'pemberi_tugas' => 'required',
            'status_penyelesaian' => 'required|numeric',
            'status_final_mhs' => 'required',
            'status_final_penilai' => 'required'
        ], [
            'id_mhs.required' => 'ID Mahasiswa wajib diisi',
            'id_penilai.required' => 'ID Penilai wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'deskripsi_pekerjaan.required' => 'Deskripsi pekerjaan wajib diisi',
            'kuantitas_volume.required' => 'Volume wajib diisi',
            'kuantitas_volume.numeric' => 'Volume wajib berisi dalam angka',
            'kuantitas_satuan.required' => 'Satuan wajib diisi',
            'durasi_waktu.required' => 'Durasi waktu wajib diisi',
            'pemberi_tugas.required' => 'Nama pemberi tugas wajib diisi',
            'status_penyelesaian.required' => 'Status penyelesaian wajib diisi',
            'status_penyelesaian.numeric' => 'Status penyelesaian wajib berisi dalam angka',
            'status_final_mhs.required' => 'Status final mahasiswa tugas wajib diisi',
            'status_final_penilai.required' => 'Status final penilai wajib diisi'
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'id_penilai' => $request->id_penilai,
            'tanggal' => $request->tanggal,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'kuantitas_volume' => $request->kuantitas_volume,
            'kuantitas_satuan' => $request->kuantitas_satuan,
            'durasi_waktu' => $request->durasi_waktu,
            'pemberi_tugas' => $request->pemberi_tugas,
            'status_penyelesaian' => $request->status_penyelesaian,
            'status_final_mhs' => $request->status_final_mhs,
            'status_final_penilai' => $request->status_final_penilai
        ];
        JurnalingHarian::create($data);
        return redirect()->to('/admin/jurnaling_harians')->with('success', 'Berhasil menambahkan kegiatan pada Log Book');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JurnalingHarian::where('id', $id)->first();
        return view('database.jurnaling_harians.edit')->with('data', $data)->with('mahasiswas', Mahasiswa::all())->with('pembimbing_lapangans', PembimbingLapangan::all())->with('jurnaling_harians', JurnalingHarian::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('id_penilai', $request->id_penilai);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('deskripsi_pekerjaan', $request->deskripsi_pekerjaan);
        Session::flash('kuantitas_volume', $request->kuantitas_volume);
        Session::flash('kuantitas_satuan', $request->kuantitas_satuan);
        Session::flash('durasi_waktu', $request->durasi_waktu);
        Session::flash('pemberi_tugas', $request->pemberi_tugas);
        Session::flash('status_penyelesaian', $request->status_penyelesaian);
        Session::flash('status_final_mhs', $request->status_final_mhs);
        Session::flash('status_final_penilai', $request->status_final_mhs);
        $request->validate([
            'id_mhs' => 'required',
            'id_penilai' => 'required',
            'tanggal' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'kuantitas_volume' => 'required|numeric',
            'kuantitas_satuan' => 'required',
            'durasi_waktu' => 'required',
            'pemberi_tugas' => 'required',
            'status_penyelesaian' => 'required|numeric',
            'status_final_mhs' => 'required',
            'status_final_penilai' => 'required'
        ], [
            'id_mhs.required' => 'ID Mahasiswa wajib diisi',
            'id_penilai.required' => 'ID Penilai wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'deskripsi_pekerjaan.required' => 'Deskripsi pekerjaan wajib diisi',
            'kuantitas_volume.required' => 'Volume wajib diisi',
            'kuantitas_volume.numeric' => 'Volume wajib berisi dalam angka',
            'kuantitas_satuan.required' => 'Satuan wajib diisi',
            'durasi_waktu.required' => 'Durasi waktu wajib diisi',
            'pemberi_tugas.required' => 'Nama pemberi tugas wajib diisi',
            'status_penyelesaian.required' => 'Status penyelesaian wajib diisi',
            'status_penyelesaian.numeric' => 'Status penyelesaian wajib berisi dalam angka',
            'status_final_mhs.required' => 'Status final mahasiswa tugas wajib diisi',
            'status_final_penilai.required' => 'Status final penilai wajib diisi'
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'id_penilai' => $request->id_penilai,
            'tanggal' => $request->tanggal,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'kuantitas_volume' => $request->kuantitas_volume,
            'kuantitas_satuan' => $request->kuantitas_satuan,
            'durasi_waktu' => $request->durasi_waktu,
            'pemberi_tugas' => $request->pemberi_tugas,
            'status_penyelesaian' => $request->status_penyelesaian,
            'status_final_mhs' => $request->status_final_mhs,
            'status_final_penilai' => $request->status_final_penilai
        ];
        JurnalingHarian::where('id', $id)->update($data);
        return redirect()->to('/admin/jurnaling_harians')->with('success', 'Berhasil mengubah data log book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JurnalingHarian::where('id', $id)->delete();
        return redirect()->to('/admin/jurnaling_harians')->with('success', 'Data berhasil dihapus!');
    }
}
