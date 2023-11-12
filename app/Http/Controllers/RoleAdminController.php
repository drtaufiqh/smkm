<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\PemilihanLokasi;

class RoleAdminController extends Controller
{
    public function bandingLokasi()
    {
        return view('admin.bandinglokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'banding',
            'pemilihan_lokasis' => PemilihanLokasi::all()
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'title'=> 'Dashboard | Admin',
            'sidebar'=> 'dashboard',
            'circle_sidebar'=> ''
        ]);
    }

    public function database()
    {
        return view('admin.database', [
            'title'=> 'database | Admin',
            'sidebar'=> 'database',
            'circle_sidebar'=> '',
            'mahasiswas' => Mahasiswa::all()
        ]);
    }

    public function penentuanLokasi()
    {
        return view('admin.penentuanlokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'penentuan',
            'pemilihan_lokasis' => PemilihanLokasi::all()
        ]);
    }

}

