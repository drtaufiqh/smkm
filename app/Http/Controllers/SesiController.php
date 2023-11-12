<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view("login");
    }


    function login(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ],[
            'email.required'=> 'Email wajib diisi',
            'password.required'=> 'Password wajib diisi'
        ]);

        $infoLogin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infoLogin)){
            // $role = Auth::user()->role;
            // if($role === 'admin'){
            //     return redirect('/admin/dashboard');
            // } elseif ($role === 'dospem') {
            //     return redirect('/dospem/dashboard');
            // } elseif ($role === 'instansi') {
            //     return redirect('/instansi-dashboard');
            // } elseif ($role === 'mhs') {
            //     return redirect('/mahasiswa/index');
            // } elseif ($role === 'prov') {
            //     return redirect('/prov-dashboard');
            // } elseif ($role === 'pemlap') {
            //     return redirect('/pemlap/dashboard');
            // }
            return $this->home();
        }else{
            return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }

    function home(){
        $role = Auth::user()->role;
        if($role === 'admin'){
            return redirect('/admin/dashboard');
        } elseif ($role === 'dospem') {
            return redirect('/dospem/dashboard');
        } elseif ($role === 'instansi') {
            return redirect('/bps-instansi/dashboard');
        } elseif ($role === 'mhs') {
            return redirect('/mahasiswa/index');
        } elseif ($role === 'prov') {
            return redirect('/bps-provinsi/dashboard');
        } elseif ($role === 'pemlap') {
            return redirect('/pemlap/dashboard');
        }
    }
}

