<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use App\Models\Instansi;
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

    public function getInstansi($id)
    {
        // $kotas = KabKota::where('id_prov', $id);
            
        // Retrieve Instansi instances in the specified province
        $instansis = Instansi::with('kabKota.provinsi')
        ->whereHas('kabKota.provinsi', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->pluck('nama', 'id');

        // You can now return $instansis or convert it to JSON if needed
        return response()->json($instansis);
    }

}
