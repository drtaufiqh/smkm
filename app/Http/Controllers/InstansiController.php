<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Http\Requests\StoreInstansiRequest;
use App\Http\Requests\UpdateInstansiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InstansiController extends Controller
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
        if (strlen($katakunci)) {
            $data = Instansi::where('id_user', 'like', '%' . $katakunci . '%')
                    ->orWhere('nama', 'like', "%$katakunci%")
                    ->orWhere('id_kecamatan', 'like', "%$katakunci%")
                    ->orWhere('alamat_lengkap', 'like', "%$katakunci%")
                    ->orWhere('is_prov', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = Instansi::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('database.instansis.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('database.instansis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstansiRequest  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        //Session::flash('id', $request->id);
        $request->validate(Instansi::$rules);
        Session::flash('id_user', $request->id_user);
        Session::flash('nama', $request->nama);
        Session::flash('id_kecamatan', $request->id_kecamatan);
        Session::flash('alamat_lengkap', $request->alamat_lengkap); 
        Session::flash('is_prov', $request->is_prov);

        
        $request->validate([
            'id_user' => 'required|numeric|unique:instansis,id_user',
            'nama' => 'required|string|unique:instansis,nama',
            'id_kecamatan' => 'required|numeric',
            'alamat_lengkap' => 'required',
            'is_prov' => 'required',
        ], [
            'id_user.required' => 'ID User wajib diisi',
            'id_user.numeric' => 'ID User harus berupa angka',
            'id_user.unique' => 'ID User sudah ada',
        
            'nama.required' => 'Nama wajib diisi',
            'nama.string' => 'Nama harus berupa string',
            'nama.unique' => 'Nama sudah ada',
        
            'id_kecamatan.required' => 'ID Kecamatan wajib diisi',
            'id_kecamatan.numeric' => 'ID Kecamatan harus berupa angka',
        
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi',
        
            'is_prov.required' => 'Is Provinsi wajib diisi',
        ]);       

        $data = [
            // 'id' => $request->id,
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'id_kecamatan' => $request->id_kecamatan,
            'alamat_lengkap' => $request->alamat_lengkap,
            'is_prov' => $request->is_prov,
        ];

        Instansi::create($data);
        return redirect()->to('instansis')->with('success', 'Berhasil menambahkan data');
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
        $data = Instansi::where('id', $id)->first();
        return view('database.instansis.edit')->with('data', $data);
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
        
        // Session::flash('kolom_text_contoh', $request->kolom_text_contoh);
        // Session::flash('kolom_email_contoh', $request->kolom_email_contoh);
        $request->validate([
            'id_user' => 'required|numeric',
            'nama' => 'required|string',
            'id_kecamatan' => 'required|numeric',
            'alamat_lengkap' => 'required',
            'is_prov' => 'required',
        ], [
            'id_user.required' => 'ID User wajib diisi',
            'id_user.numeric' => 'ID User harus berupa angka',
        
            'nama.required' => 'Nama wajib diisi',
            'nama.string' => 'Nama harus berupa string',
        
            'id_kecamatan.required' => 'ID Kecamatan wajib diisi',
            'id_kecamatan.numeric' => 'ID Kecamatan harus berupa angka',
        
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi',
        
            'is_prov.required' => 'Is Provinsi wajib diisi',
        ]); 
        
        $data = [
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'id_kecamatan' => $request->id_kecamatan,
            'alamat_lengkap' => $request->alamat_lengkap,
            'is_prov' => $request->is_prov,
        ];

        Instansi::where('id', $id)->update($data);
        return redirect()->to('instansis')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instansi::where('id', $id)->delete();
        return redirect()->to('instansis')->with('success','Data berhasil dihapus!');
    }
}
