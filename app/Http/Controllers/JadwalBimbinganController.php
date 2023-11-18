<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JadwalBimbingan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJadwalBimbinganRequest;
use App\Http\Requests\UpdateJadwalBimbinganRequest;

class JadwalBimbinganController extends Controller
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
            $data = JadwalBimbingan::where('tanggal', 'like', '%' . $katakunci . '%')
                    ->orWhere('id', 'like', "%$katakunci%")
                    ->orWhere('jam', 'like', "%$katakunci%")
                    ->orWhere('lokasi', 'like', "%$katakunci%")
                    ->orWhere('link', 'like', "%$katakunci%")
                    ->orWhere('id_dosen_pembimbing', 'like', "%$katakunci%")
                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = JadwalBimbingan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.jadwal_bimbingans.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.jadwal_bimbingans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('jam', $request->jam);
        Session::flash('lokasi', $request->lokasi);
        Session::flash('link', $request->link);
        Session::flash('id_dosen_pembimbing', $request->id_dosen_pembimbing);

        $request->validate([
            'tanggal' => 'required',
            'jam' => ['required'],
            'lokasi' => ['required'],
            'id_dosen_pembimbing' => ['required']
        ],[
            'tanggal.required'=>"Tanggal bimbingan harus diisi",
            'jam.required'=>"Jam bimbingan harus diisi",
            'lokasi.required'=>"Lokasi bimbingan harus diisi",
            'id_dosen_pembimbing.required'=>"Id dosen pembimbing harus diisi",

            
        ]);

        $data = [
            'tanggal' => $request->input('tanggal'),
            'jam' => $request->input('jam'),
            'link' => $request->input('link'),
            'lokasi' => $request->input('lokasi'),
            'id_dosen_pembimbing' => $request->input('id_dosen_pembimbing'),
        ];

        JadwalBimbingan::create($data);
        return redirect()->to('/admin/jadwal_bimbingans')->with('success', 'Berhasil menambahkan data');
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
        $data = JadwalBimbingan::where('id', $id)->first();
        return view('database.jadwal_bimbingans.edit')->with('data', $data);
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
        $request->validate([
            'tanggal' => 'required',
            'jam' => ['required'],
            'lokasi' => ['required'],
            'id_dosen_pembimbing' => ['required']
        ],[
            'tanggal.required'=>"Tanggal bimbingan harus diisi",
            'jam.required'=>"Jam bimbingan harus diisi",
            'lokasi.required'=>"Lokasi bimbingan harus diisi",
            'id_dosen_pembimbing.required'=>"Id dosen pembimbing harus diisi",

            
        ]);

        $data = [
            'tanggal' => $request->input('tanggal'),
            'jam' => $request->input('jam'),
            'link' => $request->input('link'),
            'lokasi' => $request->input('lokasi'),
            'id_dosen_pembimbing' => $request->input('id_dosen_pembimbing'),
        ];

        JadwalBimbingan::where('id', $id)->update($data);
        return redirect()->to('/admin/jadwal_bimbingans')->with('success', 'Berhasil melakukan update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JadwalBimbingan::where('id', $id)->delete();
        return redirect()->to('/admin/jadwal_bimbingans')->with('success','Data berhasil dihapus!');
    }
}