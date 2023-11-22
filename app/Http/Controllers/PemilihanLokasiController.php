<?php

namespace App\Http\Controllers;

use App\Models\PemilihanLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemilihanLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = PemilihanLokasi::where('id_mhs', 'like', "%$katakunci%")
                ->orWhere('id_pilihan_1', 'like', "%$katakunci%")
                ->orWhere('id_pilihan_2', 'like', "%$katakunci%")
                ->orWhere('alasan_pilihan_1', 'like', "%$katakunci%")
                ->orWhere('alasan_pilihan_2', 'like', "%$katakunci%")
                ->orWhere('id_instansi_ajuan', 'like', "%$katakunci%")
                ->orWhere('id_instansi_banding', 'like', "%$katakunci%")
                ->orWhere('alasan_banding', 'like', "%$katakunci%")
                ->orWhere('id_instansi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = PemilihanLokasi::orderby('id', 'desc')->paginate($jumlahbaris);
        }
        return view('database.pemilihan_lokasis.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('database.pemilihan_lokasis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Session::flash('id', $request->id);
        $request->validate(PemilihanLokasi::$rules);
        Session::flash('id_mhs', $request->id_mhs);
        Session::flash('id_pilihan_1', $request->id_pilihan_1);
        Session::flash('id_pilihan_2', $request->id_pilihan_2);
        Session::flash('alasan_pilihan_1', $request->alasan_pilihan_1);
        Session::flash('alasan_pilihan_2', $request->alasan_pilihan_2);
        Session::flash('id_instansi_ajuan', $request->id_instansi_ajuan);
        Session::flash('id_instansi_banding', $request->id_instansi_banding);
        Session::flash('alasan_banding', $request->alasan_banding);
        Session::flash('id_instansi', $request->id_instansi);

        $request->validate([
            'id_mhs' => 'required|numeric',
            'id_pilihan_1' => 'required|numeric|max:20',
            'id_pilihan_2' => 'numeric|max:20',
            'alasan_pilihan_1' => 'required|string',
            'alasan_pilihan_2' => 'string',
            'id_instansi_ajuan' => 'required|numeric|max:20',
            'id_instansi_banding' => 'required|numeric|max:20',
            'alasan_banding' => 'required|string',
            'id_instansi' => 'required|numeric|max:20',
        ], [
            'id_mhs.required' => 'Id Mahasiswa Wajib Diisi',

            'id_pilihan_1.required' => 'Pilihan 1 Wajib Diisi',
            'id_pilihan_1.numeric' => 'Pilihan 1 Wajib Dalam Angka',
            'id_pilihan_1.max' => 'Pilihan 1 harus terdiri dari maksimal 20 angka',

            'id_pilihan_2.numeric' => 'Pilihan 2 Wajib Dalam Angka',
            'id_pilihan_2.max' => 'Pilihan 2 harus terdiri dari maksimal 20 angka',

            'alasan_pilihan_1.required' => 'Alasan Pilihan 1 Wajib Diisi',
            'alasan_pilihan_1.string' => 'Alasan Pilihan 1 Wajib Dalam Teks',

            'alasan_pilihan_2.string' => 'Alasan Pilihan 2 Wajib Dalam Teks',

            'id_instansi_ajuan.required' => 'Instansi Ajuan Wajib Diisi',
            'id_instansi_ajuan.numeric' => 'Instansi Ajuan Wajib Dalam Angka',
            'id_instansi_ajuan.max' => 'Instansi Ajuan harus terdiri dari maksimal 20 angka',

            'id_instansi_banding.required' => 'Instansi Banding Wajib Diisi',
            'id_instansi_banding.numeric' => 'Instansi Banding Wajib Dalam Angka',
            'id_instansi_banding.max' => 'Instansi Banding harus terdiri dari maksimal 20 angka',

            'alasan_banding.string' => 'Alasan Banding Wajib Dalam Teks',

            'id_instansi.required' => 'Pilihan Instansi Wajib Diisi',
            'id_instansi.numeric' => 'Pilihan Instansi Wajib Dalam Angka',
            'id_instansi.max' => 'Pilihan Instansi harus terdiri dari maksimal 20 angka',
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'id_pilihan_1' => $request->id_pilihan_1,
            'id_pilihan_2' => $request->id_pilihan_2,
            'alasan_pilihan_1' => $request->alasan_pilihan_1,
            'alasan_pilihan_2' => $request->alasan_pilihan_2,
            'id_instansi_ajuan' => $request->id_instansi_ajuan,
            'id_instansi_banding' => $request->id_instansi_banding,
            'alasan_banding' => $request->alasan_banding,
            'id_instansi' => $request->id_instansi,
        ];
        PemilihanLokasi::create($data);
        return redirect()->to('/admin/pemilihan_lokasis')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = PemilihanLokasi::where('id', $id)->first();
        return view('database.pemilihan_lokasis.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mhs' => 'required|numeric',
            'id_pilihan_1' => 'required|numeric|max:20',
            'id_pilihan_2' => 'numeric|max:20',
            'alasan_pilihan_1' => 'required|string',
            'alasan_pilihan_2' => 'string',
            'id_instansi_ajuan' => 'required|numeric|max:20',
            'id_instansi_banding' => 'required|numeric|max:20',
            'alasan_banding' => 'required|string',
            'id_instansi' => 'required|numeric|max:20',
        ], [
            'id_mhs.required' => 'Id Mahasiswa Wajib Diisi',

            'id_pilihan_1.required' => 'Pilihan 1 Wajib Diisi',
            'id_pilihan_1.numeric' => 'Pilihan 1 Wajib Dalam Angka',
            'id_pilihan_1.max' => 'Pilihan 1 harus terdiri dari maksimal 20 angka',

            'id_pilihan_2.numeric' => 'Pilihan 2 Wajib Dalam Angka',
            'id_pilihan_2.max' => 'Pilihan 2 harus terdiri dari maksimal 20 angka',

            'alasan_pilihan_1.required' => 'Alasan Pilihan 1 Wajib Diisi',
            'alasan_pilihan_1.text' => 'Alasan Pilihan 1 Wajib Dalam Teks',

            'alasan_pilihan_2.text' => 'Alasan Pilihan 2 Wajib Dalam Teks',

            'id_instansi_ajuan.required' => 'Instansi Ajuan Wajib Diisi',
            'id_instansi_ajuan.numeric' => 'Instansi Ajuan Wajib Dalam Angka',
            'id_instansi_ajuan.max' => 'Instansi Ajuan harus terdiri dari maksimal 20 angka',

            'id_instansi_banding.required' => 'Instansi Banding Wajib Diisi',
            'id_instansi_banding.numeric' => 'Instansi Banding Wajib Dalam Angka',
            'id_instansi_banding.max' => 'Instansi Banding harus terdiri dari maksimal 20 angka',

            'alasan_banding_2.text' => 'Alasan Banding 2 Wajib Dalam Teks',

            'id_instansi.required' => 'Pilihan Instansi Wajib Diisi',
            'id_instansi.numeric' => 'Pilihan Instansi Wajib Dalam Angka',
            'id_instansi.max' => 'Pilihan Instansi harus terdiri dari maksimal 20 angka',
        ]);
        $data = [
            'id_mhs' => $request->id_mhs,
            'id_pilihan_1' => $request->id_pilihan_1,
            'id_pilihan_2' => $request->id_pilihan_2,
            'alasan_pilihan_1' => $request->alasan_pilihan_1,
            'alasan_pilihan_2' => $request->alasan_pilihan_2,
            'id_instansi_ajuan' => $request->id_instansi_ajuan,
            'id_instansi_banding' => $request->id_instansi_banding,
            'alasan_banding' => $request->alasan_banding,
            'id_instansi' => $request->id_instansi,
        ];
        PemilihanLokasi::where('id', $id)->update($data);
        return redirect()->to('/admin/pemilihan_lokasis')->with('success', 'berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PemilihanLokasi::where('id', $id)->delete();
        return redirect()->to('/admin/pemilihan_lokasis')->with('success', 'berhasil menghapus data');
    }

    public function updateStatus(Request $request, $id)
    {
        $pemilihanLokasi = PemilihanLokasi::find($id);

        if (!$pemilihanLokasi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Ambil data dari form
        $status = $request->input('status');

        // Lakukan validasi atau logika lainnya sesuai kebutuhan

        // Perbarui status pada model
        $pemilihanLokasi->status = $status;
        $pemilihanLokasi->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }
}
