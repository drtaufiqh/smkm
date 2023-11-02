<?php

namespace App\Http\Controllers;

use App\Models\LaporanAkhir;
use App\Http\Requests\StoreLaporanAkhirRequest;
use App\Http\Requests\UpdateLaporanAkhirRequest;

class LaporanAkhirController extends Controller
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
     * @param  \App\Http\Requests\StoreLaporanAkhirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaporanAkhirRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanAkhir $laporanAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanAkhir $laporanAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanAkhirRequest  $request
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaporanAkhirRequest $request, LaporanAkhir $laporanAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanAkhir  $laporanAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanAkhir $laporanAkhir)
    {
        //
    }
}
