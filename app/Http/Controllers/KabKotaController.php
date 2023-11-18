<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KabKotaController extends Controller
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
        if (strlen($katakunci)) {
            $data = KabKota::where('kode', 'like', '%' . $katakunci . '%')
                    ->orWhere('nama', 'like', "%$katakunci%")
                    ->orWhere('akronim', 'like', "%$katakunci%")
                    ->orWhere('id_prov', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = KabKota::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('database.kab_kotas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.kab_kotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Session::flash('id', $request->id);
        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        Session::flash('akronim', $request->akronim);
        Session::flash('id_prov', $request->id_prov);
        
        $request->validate([
            // 'id' => 'required|numeric|unique:kab_kotas,id',
            'kode' =>'required|string|size:4|unique:kab_kotas,kode',
            'nama' => 'required|unique:kab_kotas,nama',
            'akronim' => 'required|unique:kab_kotas,akronim',
            'id_prov' => 'required|numeric:kab_kotas,id_prov',
        ],[
            // 'id.required'=>'ID Wajib Diisi',
            // 'id.numeric' => 'ID Wajib Dalam Angka',
            // 'id.unique' => 'ID Sudah Ada',

            'kode.required'=>'kode Wajib Diisi',
            'kode.unique' => 'kode Sudah Ada',

            'nama.required'=>'nama Wajib Diisi',
            'nama.unique' => 'nama Sudah Ada',

            'akronim.required'=>'akronim Wajib Diisi',
            'akronim.unique' => 'akronim Sudah Ada',

            'id_prov.required'=>'id_prov Wajib Diisi',
            'id_prov.numeric' => 'id_prov Wajib Dalam Angka'
        ]);

        $data = [
            // 'id' => $request->id,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
            'id_prov' => $request->id_prov,
        ];

        KabKota::create($data);
        return redirect()->to('kab_kotas')->with('success', 'Berhasil menambahkan data');
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
        $data = KabKota::where('id', $id)->first();
        return view('database.kab_kotas.edit')->with('data', $data);
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
            'kode' =>'required|size:4',
            'nama' => 'required',
            'akronim' => 'required',
            'id_prov' => 'required|numeric:kab_kotas,id_prov',
        ],[
            'kode.required'=>'kode Wajib Diisi',
            'kode.size'=>'kode 4 angka Diisi',

            'nama.required'=>'nama Wajib Diisi',

            'akronim.required'=>'akronim Wajib Diisi',

            'id_prov.required'=>'id_prov Wajib Diisi',
            'id_prov.numeric' => 'id_prov Wajib Dalam Angka'
        ]);

        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
            'id_prov' => $request->id_prov,
        ];

        KabKota::where('id', $id)->update($data);
        return redirect()->to('kab_kotas')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KabKota::where('id', $id)->delete();
        return redirect()->to('kab_kotas')->with('success','Data berhasil dihapus!');
    }
}
