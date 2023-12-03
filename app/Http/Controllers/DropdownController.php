<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    //// DropdownController.php

    public function getProvinsi()
    {
        $provinsis = Provinsi::pluck('nama', 'id');
        return response()->json($provinsis);
    }

    public function getKota($id)
    {
        $kotas = KabKota::where('id_prov', $id)->pluck('nama', 'id');
        return response()->json($kotas);
    }

}
