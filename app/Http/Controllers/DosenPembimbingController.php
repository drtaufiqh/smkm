<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use App\Models\DosenPembimbing;
use App\Models\JadwalBimbingan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreDosenPembimbingRequest;
use App\Http\Requests\UpdateDosenPembimbingRequest;

class DosenPembimbingController extends Controller
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
            $data = DosenPembimbing::where('nama', 'like', '%' . $katakunci . '%')
                    ->orWhere('id', 'like', "%$katakunci%")
                    ->orWhere('nip_lama', 'like', "%$katakunci%")
                    ->orWhere('nip_baru', 'like', "%$katakunci%")
                    ->orWhere('email', 'like', "%$katakunci%")
                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = DosenPembimbing::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.dosen_pembimbings.index')->with('data', $data)->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.dosen_pembimbings.create')->with('users', User::all());
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
        Session::flash('id_user', $request->id_user);
        Session::flash('nama', $request->nama);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('nip_lama', $request->nip_lama);
        Session::flash('nip_baru', $request->nip_baru);
        Session::flash('email', $request->email);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('foto', $request->foto);

        $request->validate([
            'id_user'=>'required|unique:pembimbing_lapangans,id_user',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'nip_lama'=>'required|unique:pembimbing_lapangans,nip_lama',
            'nip_baru'=>'required|unique:pembimbing_lapangans,nip_baru',
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
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'foto'=>$request->foto
        ];

        DosenPembimbing::create($data);
        return redirect()->to('/admin/dosen_pembimbings')->with('success', 'Berhasil menambahkan data');
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
        $data = DosenPembimbing::where('id', $id)->first();
        return view('database.dosen_pembimbings.edit')->with('data', $data)->with('users', User::all());
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
            'id_user'=>'required|unique:pembimbing_lapangans,id_user',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'nip_lama'=>'required|unique:pembimbing_lapangans,nip_lama',
            'nip_baru'=>'required|unique:pembimbing_lapangans,nip_baru',
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
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'foto'=>$request->foto
        ];

        DosenPembimbing::where('id', $id)->update($data);
        return redirect()->to('/admin/dosen_pembimbings')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     DosenPembimbing::where('id', $id)->delete();
    //     return redirect()->to('/admin/dosen_pembimbings')->with('success','Data berhasil dihapus!');
    // }

    public function destroy($id)
    {
    // Hapus terlebih dahulu baris terkait di tabel jadwal_bimbingans
    JadwalBimbingan::where('id_dosen_pembimbing', $id)->delete();
    return redirect()->to('/admin/dosen_pembimbings')->with('success', 'Data berhasil dihapus!');
    }
}
