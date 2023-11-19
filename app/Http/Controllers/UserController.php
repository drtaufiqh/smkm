<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // Contoh Video
        // $katakunci = $request->katakunci;
        // $jumlahbaris = 2;
        // if (strlen($katakunci)) {
        //     $data = Mahasiswa::where('nama', 'like', '%' . $katakunci . '%')
        //             ->orWhere('nim', 'like', "%$katakunci%")
        //             ->orWhere('jurusan', 'like', "%$katakunci%")
        //             ->orderBy('nim', 'desc')
        //             ->paginate($jumlahbaris);
        // }else{
        //     $data = Mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        // }
        // return view('database.mahasiswa.index')->with('data', $data);

        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = User::where('username', 'like', '%' . $katakunci . '%')
                    ->orWhere('id', 'like', "%$katakunci%")
                    ->orWhere('email', 'like', "%$katakunci%")
                    ->orWhere('role', 'like', "%$katakunci%")
                    ->orderBy('id', 'desc')
                    ->paginate($jumlahbaris);
        }else{
            $data = User::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.users.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // // Contoh Video
        // return view('database.mahasiswa.create');

        return view('database.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Contoh Video
        // Session::flash('nim', $request->nim);
        // Session::flash('nama', $request->nama);
        // Session::flash('jurusan', $request->jurusan);
        // $request->validate([
        //     'nim' => 'required|numeric|unique:mahasiswas,nim',
        //     'nama' => ['required', 'string'],
        //     'jurusan' => ['required', 'string']
        // ],[
        //     'nim.required'=>"NIM harus diisi",
        //     'nim.numeric'=>"NIM tidak valid",
        //     'nim.unique'=>"NIM sudah terdaftar",
        //     'nama.required'=>"Nama mahasiswa harus diisi",
        //     'nama.string'=>"Nama mahasiswa tidak valid",
        //     'jurusan.required'=>"Jurusan mahasiswa harus diisi",
        //     'jurusan.string'=>"Jurusan mahasiswa tidak valid"
        // ]);

        // $data = [
        //     'nama' => $request->input('nama'),
        //     'nim' => $request->input('nim'),
        //     'jurusan' => $request->input('jurusan')
        // ];

        // Mahasiswa::create($data);
        // return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
        
        Session::flash('id', $request->id);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        // Session::flash('email_verified_at', $request->email_verified_at);
        Session::flash('password', $request->password);
        Session::flash('role', $request->role);
        // Session::flash('remember_token', $request->remember_token);
        // Session::flash('created_at', $request->created_at);
        // Session::flash('updated_at', $request->updated_at);
        
        $request->validate([
            // 'id' => 'required|numeric|unique:users,id',
            'username' => ['required', 'string'],
            'email' => ['required', 'string'],
            // 'email_verified_at' => ['nullable','date'],
            'password' => ['required', 'string'],
            'role' => ['required', 'string'],
            // 'remember_token' => ['nullable', 'string'],
            // 'created_at' => ['nullable', 'date'],
            // 'updated_at' => ['nullable', 'date']
        ],[
            // 'id.required'=>"id harus diisi",
            // 'id.numeric'=>"id tidak valid",
            // 'id.unique'=>"id sudah terdaftar",

            'username.required'=>"username harus diisi",
            'username.string'=>"username tidak valid",

            'email.required'=>"email harus diisi",
            'email.string'=>"email tidak valid",

            // 'email_verified_at.nullable'=>"tanggal verifikasi email harus diisi",
            // 'email_verified_at.date'=>"format tanggal verifikasi email salah",
            
            'password.required'=>"password harus diisi",
            'password.string'=>"password tidak valid",

            'role.required'=>"role harus diisi",
            'role.string'=>"role tidak valid",

            // 'remember_token.nullable'=>"token harus diisi",
            // 'remember_token.string'=>"token tidak valid",

            // 'created_at.nullable'=>"waktu pembuatan harus diisi",
            // 'created_at.date'=>"format waktu pembuatan salah",

            // 'updated_at.nullable'=>"waktu perubahan harus diisi",
            // 'updated_at.date'=>"format waktu perubahan salah"
        ]);

        $data = [
            'id' => $request->input('id'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            // 'email_verified_at' => $request->input('email_verified_at'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            // 'remember_token' => $request->input('remember_token'),
            // 'created_at' => $request->input('created_at'),
            // 'updated_at' => $request->input('updated_at')
        ];

        User::create($data);
        return redirect()->to('users')->with('success', 'Berhasil menambahkan data');
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
        // // Contoh Video
        // $data = Mahasiswa::where('nim', $nim)->first();
        // return view('database.mahasiswa.edit')->with('data', $data);

        $data = User::where('id', $id)->first();
        return view('database.users.edit')->with('data', $data);
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
        // // Contoh Video
        // Session::flash('nama', $request->nama);
        // Session::flash('jurusan', $request->jurusan);
        // $request->validate([
        //     'nama' => ['required', 'string'],
        //     'jurusan' => ['required', 'string']
        // ],[
        //     'nama.required'=>"Nama mahasiswa harus diisi",
        //     'nama.string'=>"Nama mahasiswa tidak valid",
        //     'jurusan.required'=>"Jurusan mahasiswa harus diisi",
        //     'jurusan.string'=>"Jurusan mahasiswa tidak valid"
        // ]);

        // $data = [
        //     'nama' => $request->input('nama'),
        //     'jurusan' => $request->input('jurusan')
        // ];

        // Mahasiswa::where('nim', $nim)->update($data);
        // return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');

        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('role', $request->role);
        $request->validate([
            'username' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role' => ['required', 'string']
        ],[
            'username.required'=>"username harus diisi",
            'username.string'=>"username tidak valid",

            'email.required'=>"email harus diisi",
            'email.string'=>"email tidak valid",
            
            'password.required'=>"password harus diisi",
            'password.string'=>"password tidak valid",

            'role.required'=>"role harus diisi",
            'role.string'=>"role tidak valid"
        ]);

        $data = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role')
        ];

        User::where('id', $id)->update($data);
        return redirect()->to('users')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Mahasiswa $mahasiswa)
    public function destroy($id)
    {
        // // Contoh Video
        // Mahasiswa::where('nim', $nim)->delete();
        // return redirect()->to('mahasiswa')->with('success','Data berhasil dihapus!');

        User::where('id', $id)->delete();
        return redirect()->to('users')->with('success','Data berhasil dihapus!');
    }
}
