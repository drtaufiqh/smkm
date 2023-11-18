<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Provinsi::where('kode', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('akronim', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = Provinsi::orderby('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.provinsis.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('database.provinsis.create');
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

        $request->validate([
            // 'id' => 'required|numeric|unique:provinsis,id',
            'nama' => 'required|unique:provinsis,nama',
            'kode' =>'required|string|max:2|unique:provinsis,kode',
            'akronim' => 'required|unique:provinsis,akronim',
        ],[
            // 'id.required'=>'ID Wajib Diisi',
            // 'id.numeric' => 'ID Wajib Dalam Angka',
            // 'id.unique' => 'ID Sudah Ada',

            'kode.required'=>'kode Wajib Diisi',
            'kode.unique' => 'kode Sudah Ada',
            'kode.max' => 'Kode harus terdiri dari 2 angka',

            'nama.required'=>'nama Wajib Diisi',
            'nama.unique' => 'nama Sudah Ada',

            'akronim.required'=>'akronim Wajib Diisi',
            'akronim.unique' => 'akronim Sudah Ada'
        ]);
        $data = [
            // 'id' => $request->id,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
        ];
        Provinsi::create($data);
        return redirect()->to('provinsis')->with('success', 'berhasil menambahkan data');
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
        $data = Provinsi::where('id', $id)->first();
        return view('database.provinsis.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' =>'required|string|max:2|unique:provinsis,kode',
            'nama' => 'required|unique:provinsis,nama',
            'akronim' => 'required|unique:provinsis,akronim',
        ],[
            'kode.required'=>'kode Wajib Diisi',
            'kode.unique' => 'kode Sudah Ada',
            'kode.max' => 'Kode harus terdiri dari 2 angka',

            'nama.required'=>'nama Wajib Diisi',
            'nama.unique' => 'nama Sudah Ada',

            'akronim.required'=>'akronim Wajib Diisi',
            'akronim.unique' => 'akronim Sudah Ada'
        ]);
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'akronim' => $request->akronim,
        ];
        Provinsi::where('id', $id)->update($data);
        return redirect()->to('provinsis')->with('success', 'berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Provinsi::where('id', $id)->delete();
        return redirect()->to('provinsis')->with('success', 'berhasil menghapus data');
    }
}
