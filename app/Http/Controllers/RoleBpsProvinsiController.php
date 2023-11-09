<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleBpsProvinsiController extends Controller
{
    public function approvalMahasiswa()
    {
        return view('bps-provinsi.approvalmahasiswa', [
            'title'=> 'Approval Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'approval'
        ]);
    }

    public function bandingMahasiswa()
    {
        return view('bps-provinsi.bandingmahasiswa', [
            'title'=> 'Banding Lokasi | BPS Provinsi',
            'sidebar' => 'lokasi',
            'circle_sidebar' => 'banding'
        ]);
    }

    public function dashboard()
    {
        return view('bps-provinsi.dashboard', [
            'title'=> 'Dashboard | BPS Provinsi',
            'sidebar' => 'dashboard',
            'circle_sidebar' => ''
        ]);
    }

    public function profil()
    {
        return view('bps-provinsi.profil', [
            'title'=> 'Profil | BPS Provinsi',
            'sidebar' => '',
            'circle_sidebar' => ''
        ]);
    }
}
