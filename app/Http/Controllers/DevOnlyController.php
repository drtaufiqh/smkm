<?php

namespace App\Http\Controllers;

use App\Models\Finalisasi;
use Illuminate\Http\Request;

class DevOnlyController extends Controller
{
    // dev only
    public function finalisasi_all_penentuan(){
        Finalisasi::whereNotNull('finalisasi_penentuan_lokasi_admin')->update(['finalisasi_penentuan_lokasi_bpsprov' => 1]);
        return redirect()->to('/');
    }

    public function unfinalisasi_all_penentuan(){
        Finalisasi::whereNotNull('finalisasi_penentuan_lokasi_admin')->update(['finalisasi_penentuan_lokasi_bpsprov' => null]);
        return redirect()->to('/');
    }
}
