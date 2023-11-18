<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Kecamatan::where('kode', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('akronim', 'like', "%$katakunci%")
                ->orWhere('id_kabkota', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = Kecamatan::orderby('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.kecamatans.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('database.kecamatans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Session::flash('id', $request->id);
        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        Session::flash('akronim', $request->akronim);
        Session::flash('id_kabkota', $request->id_kabkota);

        $request->validate([
            // 'id' => 'required|numeric|unique:kecamatans,id',
            'kode' =>'required|string|size:2|unique:kecamatans,kode',
            'nama' => 'required|unique:kecamatans,nama',
            'akronim' => 'required|unique:kecamatans,akronim',
            'id_kabkota' => 'required|numeric:kecamatans,id_kabkota',
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

            'id_kabkota.required'=>'id_kabkota Wajib Diisi',
            'id_kabkota.numeric' => 'id_kabkota Wajib Dalam Angka'
        ]);
        $data = [
            // 'id' => $request->id,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
            'id_kabkota' => $request->id_kabkota,
        ];
        Kecamatan::create($data);
        return redirect()->to('kecamatans')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kecamatan::where('id', $id)->first();
        return view('database.kecamatans.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' =>'required|numeric|unique:kecamatans,kode',
            'nama' => 'required|unique:kecamatans,nama',
            'akronim' => 'required|unique:kecamatans,akronim',
            'id_kabkota' => 'required|numeric:kecamatans,id_kabkota',
        ],[
            'kode.required'=>'kode Wajib Diisi',
            'kode.unique' => 'kode Sudah Ada',

            'nama.required'=>'nama Wajib Diisi',
            'nama.unique' => 'nama Sudah Ada',

            'akronim.required'=>'akronim Wajib Diisi',
            'akronim.unique' => 'akronim Sudah Ada',

            'id_kabkota.required'=>'id_kabkota Wajib Diisi',
            'id_kabkota.numeric' => 'id_kabkota Wajib Dalam Angka'
        ]);
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
            'id_kabkota' => $request->id_kabkota,
        ];
        Kecamatan::where('id', $id)->update($data);
        return redirect()->to('kecamatans')->with('success', 'berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kecamatan::where('id', $id)->delete();
        return redirect()->to('kecamatans')->with('success', 'berhasil menghapus data');
    }
}
