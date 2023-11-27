<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
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
            $data = Mahasiswa::where('id_user', 'like', '%' . $katakunci . '%')
                    ->orWhere('nama', 'like', "%$katakunci%")
                    ->orWhere('nim', 'like', "%$katakunci%")
                    ->orWhere('email', 'like', "%$katakunci%")
                    ->orWhere('no_hp', 'like', "%$katakunci%")
                    ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
                    ->orWhere('alamat_1', 'like', "%$katakunci%")
                    ->orWhere('id_kecamatan_alamat_1', 'like', "%$katakunci%")
                    ->orWhere('alamat_2', 'like', "%$katakunci%")
                    ->orWhere('id_kecamatan_alamat_2', 'like', "%$katakunci%")
                    ->orWhere('bank', 'like', "%$katakunci%")
                    ->orWhere('an_bank', 'like', "%$katakunci%")
                    ->orWhere('no_rek', 'like', "%$katakunci%")
                    ->orWhere('id_dosen_pembimbing', 'like', "%$katakunci%")
                    ->orWhere('id_pembimbing_lapangan', 'like', "%$katakunci%")
                    ->orWhere('id_instansi', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = Mahasiswa::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.mahasiswas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('database.mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Mahasiswa::$rules);
        Session::flash('id_user', $request->kode);
        Session::flash('nama', $request->nama);
        Session::flash('nim', $request->nim);
        Session::flash('email', $request->email);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('foto', $request->foto);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('alamat_1', $request->alamat_1);
        Session::flash('id_kecamatan_alamat_1', $request->id_kecamatan_alamat_1);
        Session::flash('alamat_2', $request->alamat_2);
        Session::flash('id_kecamatan_alamat_2', $request->id_kecamatan_alamat_2);
        Session::flash('bank', $request->bank);
        Session::flash('an_bank', $request->an_bank);
        Session::flash('no_rek', $request->no_rek);
        Session::flash('id_dosen_pembimbing', $request->id_dosen_pembimbing);
        Session::flash('id_pembimbing_lapangan', $request->id_pembimbing_lapangan);
        Session::flash('id_instansi', $request->id_instansi);
        
        $request->validate([
            'id_user' =>'required|numeric|unique:mahasiswas,id_user',
            'nama' => 'required|string|unique:mahasiswas,nama',
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'email' => 'required|unique:mahasiswas,email',
            'no_hp' => 'required|numeric|unique:mahasiswas,no_hp',
            'foto' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_1' => 'required',
            'id_kecamatan_alamat_1' => 'required|numeric',
            'alamat_2' => 'required',
            'id_kecamatan_alamat_2' => 'required|numeric',
            'bank' => 'required',
            'an_bank' => 'required',
            'no_rek' => 'required',
            'id_dosen_pembimbing' => 'required|numeric',
            'id_pembimbing_lapangan' => 'required|numeric',
            'id_instansi' => 'required|numeric'
        ], [
            'id_user.required' => 'ID User wajib diisi.',
            'id_user.numeric' => 'ID User harus berupa angka.',
            'id_user.unique' => 'ID User sudah digunakan.',
        
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.unique' => 'Nama sudah digunakan.',
        
            'nim.required' => 'NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah digunakan.',
        
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
        
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
            'no_hp.unique' => 'Nomor HP sudah digunakan.',
        
            'foto.required' => 'Foto wajib diunggah.',
        
            'jenis_kelamin.required' => 'Jenis Kelamin wajib dipilih.',
        
            'alamat_1.required' => 'Alamat 1 wajib diisi.',
        
            'id_kecamatan_alamat_1.required' => 'Kecamatan Alamat 1 wajib diisi.',
            'id_kecamatan_alamat_1.numeric' => 'Kecamatan Alamat 1 harus berupa angka.',
        
            'alamat_2.required' => 'Alamat 2 wajib diisi.',
        
            'id_kecamatan_alamat_2.required' => 'Kecamatan Alamat 2 wajib diisi.',
            'id_kecamatan_alamat_2.numeric' => 'Kecamatan Alamat 2 harus berupa angka.',
        
            'bank.required' => 'Bank wajib diisi.',
        
            'an_bank.required' => 'Nama Pemilik Rekening wajib diisi.',
        
            'no_rek.required' => 'Nomor Rekening wajib diisi.',
        
            'id_dosen_pembimbing.required' => 'ID Dosen Pembimbing wajib diisi.',
            'id_dosen_pembimbing.numeric' => 'ID Dosen Pembimbing harus berupa angka.',
        
            'id_pembimbing_lapangan.required' => 'ID Pembimbing Lapangan wajib diisi.',
            'id_pembimbing_lapangan.numeric' => 'ID Pembimbing Lapangan harus berupa angka.',
        
            'id_instansi.required' => 'ID Instansi wajib diisi.',
            'id_instansi.numeric' => 'ID Instansi harus berupa angka.'
        ]);        

        $data = [
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'foto' => $request->foto,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_1' => $request->alamat_1,
            'id_kecamatan_alamat_1' => $request->id_kecamatan_alamat_1,
            'alamat_2' => $request->alamat_2,
            'id_kecamatan_alamat_2' => $request->id_kecamatan_alamat_2,
            'bank' => $request->bank,
            'an_bank' => $request->an_bank,
            'no_rek' => $request->no_rek,
            'id_dosen_pembimbing' => $request->id_dosen_pembimbing,
            'id_pembimbing_lapangan' => $request->id_pembimbing_lapangan,
            'id_instansi' => $request->id_instansi
        ];
        
        

        Mahasiswa::create($data);
        return redirect()->to('/admin/mahasiswas')->with('success', 'Berhasil menambahkan data');
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
        $data = Mahasiswa::where('id', $id)->first();
        return view('database.mahasiswas.edit')->with('data', $data);
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
            'nama' => 'required|string',
            'nim' => 'required|numeric',
            'email' => 'required',
            'no_hp' => 'required|numeric',
            'foto' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_1' => 'required',
            'id_kecamatan_alamat_1' => 'required|numeric',
            'alamat_2' => 'required',
            'id_kecamatan_alamat_2' => 'required|numeric',
            'bank' => 'required',
            'an_bank' => 'required',
            'no_rek' => 'required',
            'id_dosen_pembimbing' => 'required|numeric',
            'id_pembimbing_lapangan' => 'required|numeric',
            'id_instansi' => 'required|numeric'
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
        
            'nim.required' => 'NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
        
            'email.required' => 'Email wajib diisi.',
        
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
        
            'foto.required' => 'Foto wajib diunggah.',
        
            'jenis_kelamin.required' => 'Jenis Kelamin wajib dipilih.',
        
            'alamat_1.required' => 'Alamat 1 wajib diisi.',
        
            'id_kecamatan_alamat_1.required' => 'Kecamatan Alamat 1 wajib diisi.',
            'id_kecamatan_alamat_1.numeric' => 'Kecamatan Alamat 1 harus berupa angka.',
        
            'alamat_2.required' => 'Alamat 2 wajib diisi.',
        
            'id_kecamatan_alamat_2.required' => 'Kecamatan Alamat 2 wajib diisi.',
            'id_kecamatan_alamat_2.numeric' => 'Kecamatan Alamat 2 harus berupa angka.',
        
            'bank.required' => 'Bank wajib diisi.',
        
            'an_bank.required' => 'Nama Pemilik Rekening wajib diisi.',
        
            'no_rek.required' => 'Nomor Rekening wajib diisi.',
        
            'id_dosen_pembimbing.required' => 'ID Dosen Pembimbing wajib diisi.',
            'id_dosen_pembimbing.numeric' => 'ID Dosen Pembimbing harus berupa angka.',
        
            'id_pembimbing_lapangan.required' => 'ID Pembimbing Lapangan wajib diisi.',
            'id_pembimbing_lapangan.numeric' => 'ID Pembimbing Lapangan harus berupa angka.',
        
            'id_instansi.required' => 'ID Instansi wajib diisi.',
            'id_instansi.numeric' => 'ID Instansi harus berupa angka.'
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'foto' => $request->foto,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_1' => $request->alamat_1,
            'id_kecamatan_alamat_1' => $request->id_kecamatan_alamat_1,
            'alamat_2' => $request->alamat_2,
            'id_kecamatan_alamat_2' => $request->id_kecamatan_alamat_2,
            'bank' => $request->bank,
            'an_bank' => $request->an_bank,
            'no_rek' => $request->no_rek,
            'id_dosen_pembimbing' => $request->id_dosen_pembimbing,
            'id_pembimbing_lapangan' => $request->id_pembimbing_lapangan,
            'id_instansi' => $request->id_instansi
        ];
        

        Mahasiswa::where('id', $id)->update($data);
        return redirect()->to('/admin/mahasiswas')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id', $id)->delete();
        return redirect()->to('/admin/mahasiswas')->with('success','Data berhasil dihapus!');
    }

    public function mahasiswaExport(){
        return Excel::download(new MahasiswaExport, 'Mahasiswa.xlsx');
    }

    public function mahasiswaImportExcel(Request $request){
        // dd($request->file('file_import'));
        $file = $request->file('file_import');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);

        Excel::import(new MahasiswaImport, public_path("/DataMahasiswa/$namaFile"));
        return redirect()->to('/admin/mahasiwas');
    }
}
