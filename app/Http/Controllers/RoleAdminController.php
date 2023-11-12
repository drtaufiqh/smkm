<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    function index(){
        echo "Halo, selamat datang";
    }
    
    public function bandingLokasi()
    {
        return view('admin.bandinglokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'lokasi',
            'circle_sidebar'=> 'banding'
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
            'circle_sidebar'=> ''
        ]);
    }

    public function penentuanLokasi()
    {
        return view('admin.penentuanlokasi', [
            'title'=> 'Banding Lokasi Magang | Admin',
            'sidebar'=> 'dashboard',
            'circle_sidebar'=> ''
        ]);
    }
}

