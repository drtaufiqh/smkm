<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PembimbingLapangan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePembimbingLapanganRequest;
use App\Http\Requests\UpdatePembimbingLapanganRequest;

class PembimbingLapanganController extends Controller
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
            $data = PembimbingLapangan::where('id', 'like', '%' . $katakunci . '%')
                    ->orWhere('nama', 'like', "%$katakunci%")
                    ->orWhere('nip_lama', 'like', "%$katakunci%")
                    ->orWhere('nip_baru', 'like', "%$katakunci%")
                    ->orWhere('email', 'like', "%$katakunci%")
                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = PembimbingLapangan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.pembimbing_lapangans.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.pembimbing_lapangans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembimbingLapanganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id',$request->id);
        Session::flash('id_user',$request->id_user);
        Session::flash('id_instansi',$request->id_instansi);
        Session::flash('nama',$request->nama);
        Session::flash('jenis_kelamin',$request->jenis_kelamin);
        Session::flash('nip_lama',$request->nip_lama);
        Session::flash('nip_baru',$request->nip_baru);
        Session::flash('golongan',$request->golongan);
        Session::flash('jabatan',$request->jabatan);
        Session::flash('email',$request->email);
        Session::flash('no_hp',$request->no_hp);
        Session::flash('foto',$request->foto);

        $request->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'nip_lama'=>'required|unique:pembimbing_lapangans,nip_lama',
            'nip_baru'=>'required|unique:pembimbing_lapangans,nip_baru',
            'golongan'=>'required',
            'jabatan'=>'required',
            'email'=>'required|unique:pembimbing_lapangans,email',
            'no_hp'=>'required|unique:pembimbing_lapangans,no_hp',
            'foto'=>'required'
        ], [
            'nama.required'=>'Nama wajib diisi',
            'jenis_kelamin.required'=>'Jenis kelamin wajib diisi',
            'nip_lama.required'=>'NIP lama wajib diisi',
            'nip_lama.unique'=>'NIP lama sudah ada dalam database',
            'nip_baru.required'=>'NIP baru wajib diisi',
            'nip_baru.unique'=>'NIP baru sudah ada dalam database',
            'golongan.required'=>'Golongan wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah ada dalam database',
            'no_hp.required'=>'Nomor handphone wajib diisi',
            'no_hp.unique'=>'Nomor handphone sudah ada dalam database',
            'foto.required'=>'Foto wajib diisi'
        ]);
            $data = [
            'id_user'=>$request->id_user,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'nip_lama'=>$request->nip_lama,
            'nip_baru'=>$request->nip_baru,
            'golongan'=>$request->golongan,
            'jabatan'=>$request->jabatan,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'id_instansi'=>$request->id_instansi,
            'foto'=>$request->foto
        ];
        PembimbingLapangan::create($data);
        return redirect()->to('pembimbing_lapangans')->with('Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function show(PembimbingLapangan $pembimbingLapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PembimbingLapangan::where('id', $id)->first();
        return view('database.pembimbing_lapangans.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembimbingLapanganRequest  $request
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kelamin'=>'required',
            'nip_lama'=>'required|unique:pembimbing_lapangans,nip_lama',
            'nip_baru'=>'required|unique:pembimbing_lapangans,nip_baru',
            'golongan'=>'required',
            'jabatan'=>'required',
            'email'=>'required|unique:pembimbing_lapangans,email',
            'no_hp'=>'required|unique:pembimbing_lapangans,no_hp',
            'foto'=>'required'
        ], [
            'jenis_kelamin.required'=>'Jenis kelamin wajib diisi',
            'nip_lama.required'=>'NIP lama wajib diisi',
            'nip_lama.unique'=>'NIP lama sudah ada dalam database',
            'nip_baru.required'=>'NIP baru wajib diisi',
            'nip_baru.unique'=>'NIP baru sudah ada dalam database',
            'golongan.required'=>'Golongan wajib diisi',
            'jabatan.required'=>'Jabatan wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah ada dalam database',
            'no_hp.required'=>'Nomor handphone wajib diisi',
            'no_hp.unique'=>'Nomor handphone sudah ada dalam database',
            'foto.required'=>'Foto wajib diisi'
        ]);
            $data = [
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'nip_lama'=>$request->nip_lama,
            'nip_baru'=>$request->nip_baru,
            'golongan'=>$request->golongan,
            'jabatan'=>$request->jabatan,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'id_instansi'=>$request->id_instansi,
            'foto'=>$request->foto
        ];

        PembimbingLapangan::where('id', $id)->update($data);
        return redirect()->to('pembimbing_lapangans')->with('success', 'Berhasil melakukan update data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembimbingLapangan  $pembimbingLapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PembimbingLapangan::where('id', $id)->delete();
        return redirect()->to('pembimbing_lapangans')->with('success','Data berhasil dihapus!');

    }
}