<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\KartuKendali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreKartuKendaliRequest;
use App\Http\Requests\UpdateKartuKendaliRequest;

class KartuKendaliController extends Controller
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
            $data = KartuKendali::where('id', 'like', '%' . $katakunci . '%')
                    ->orWhere('pokok_bahasan', 'like', "%$katakunci%")
                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = KartuKendali::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.kartu_kendalis.index')->with('data', $data)->with('mahasiswas', Mahasiswa::all())->with('kartu_kendalis', KartuKendali::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.kartu_kendalis.create')->with('mahasiswas', Mahasiswa::all())->with('kartu_kendalis', KartuKendali::all());
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
        Session::flash('id_bimbingan', $request->id_bimbingan);
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('pokok_bahasan', $request->pokok_bahasan);
        Session::flash('diketahui', $request->diketahui);
        Session::flash('created_at', $request->created_at);
        Session::flash('updated_at', $request->updated_at);

        $request->validate([
            'pokok_bahasan' => ['required', 'string'],
            'id_mhs' => ['required','numeric'],
            'id_bimbingan' => ['required', 'numeric'],
            'diketahui' => 'required',
        ],[
            'pokok_bahasan.required'=>"Pokok bahasan harus diisi",
            'pokok_bahasan.string'=>"Pokok bahasan tidak valid",

            'id_mhs.required'=>"Id Mhs harus diisi",
            'id_mhs.numeric'=>"Id Mhs tidak valid",

            'id_bimbingan.required'=>"Id Bimbingan harus diisi",
            'id_bimbingan.numeric'=>"Id Bimbingan tidak valid"
        ]);

        $data = [
            'pokok_bahasan' => $request->input('pokok_bahasan'),
            'id_mhs' => $request->input('id_mhs'),
            'id_bimbingan' => $request->input('id_bimbingan'),
            'diketahui' => $request->input('diketahui')
        ];

        KartuKendali::create($data);
        return redirect()->to('kartu_kendalis')->with('success', 'Berhasil menambahkan data')->with('kartu_kendalis', KartuKendali::all());
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
        $data = KartuKendali::where('id', $id)->first();
        return view('database.kartu_kendalis.edit')->with('data', $data)->with('mahasiswas', Mahasiswa::all())->with('kartu_kendalis', KartuKendali::all());
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
            'pokok_bahasan' => ['required', 'string'],
            'id_mhs' => ['required','numeric'],
            'id_bimbingan' => ['required', 'numeric'],
            'diketahui' => 'required',
        ],[
            'pokok_bahasan.required'=>"Pokok bahasan harus diisi",
            'pokok_bahasan.string'=>"Pokok bahasan tidak valid"
        ]);

        $data = [
            'pokok_bahasan' => $request->input('pokok_bahasan'),
            'id_mhs' => $request->input('id_mhs'),
            'id_bimbingan' => $request->input('id_bimbingan'),
            'diketahui' => $request->input('diketahui')
        ];

        KartuKendali::where('id', $id)->update($data);
        return redirect()->to('kartu_kendalis')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KartuKendali::where('id', $id)->delete();
        return redirect()->to('kartu_kendalis')->with('success','Data berhasil dihapus!');
    }
}
