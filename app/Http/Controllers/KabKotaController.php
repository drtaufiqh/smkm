<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use App\Http\Requests\StoreKabKotaRequest;
use App\Http\Requests\UpdateKabKotaRequest;

class KabKotaController extends Controller
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
     * @param  \App\Http\Requests\StoreKabKotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKabKotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function show(KabKota $kabKota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function edit(KabKota $kabKota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKabKotaRequest  $request
     * @param  \App\Models\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKabKotaRequest $request, KabKota $kabKota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function destroy(KabKota $kabKota)
    {
        //
    }
}
