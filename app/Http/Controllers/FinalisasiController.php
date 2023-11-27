<?php

namespace App\Http\Controllers;

use App\Models\Finalisasi;
use App\Http\Requests\StoreFinalisasiRequest;
use App\Http\Requests\UpdateFinalisasiRequest;

class FinalisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFinalisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinalisasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finalisasi  $finalisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Finalisasi $finalisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finalisasi  $finalisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Finalisasi $finalisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinalisasiRequest  $request
     * @param  \App\Models\Finalisasi  $finalisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinalisasiRequest $request, Finalisasi $finalisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finalisasi  $finalisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finalisasi $finalisasi)
    {
        //
    }
}
