<?php

namespace App\Http\Controllers;

use App\Models\DosenPembimbing;
// use Illuminate\Foundation\Auth\User;
use App\Http\Requests\StoreDosenPembimbingRequest;
use App\Http\Requests\UpdateDosenPembimbingRequest;

class DosenPembimbingController extends Controller
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
     * @param  \App\Http\Requests\StoreDosenPembimbingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDosenPembimbingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DosenPembimbing  $dosenPembimbing
     * @return \Illuminate\Http\Response
     */
    public function show(DosenPembimbing $dosenPembimbing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DosenPembimbing  $dosenPembimbing
     * @return \Illuminate\Http\Response
     */
    public function edit(DosenPembimbing $dosenPembimbing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDosenPembimbingRequest  $request
     * @param  \App\Models\DosenPembimbing  $dosenPembimbing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDosenPembimbingRequest $request, DosenPembimbing $dosenPembimbing)
    {
        //
        // $this->authorize('update.profile', $user);
        // $data = $request->validate([
        //     'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'nama' => 'required|string|max:255',
        //     'nip_lama' => 'required|string|max:255',
        //     'nip_baru' => 'required|string|max:255',
        //     'no_hp' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        // ]);
        // $dosenPembimbing->update($data);
        // return redirect('/dospem/profil')->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DosenPembimbing  $dosenPembimbing
     * @return \Illuminate\Http\Response
     */
    public function destroy(DosenPembimbing $dosenPembimbing)
    {
        //
    }

    // public function updateProfile(Request $request)
    // {
    //     $request->validate([
    //         'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'nama' => 'required|string|max:255',
    //         'nip_lama' => 'required|string|max:255',
    //         'nip_baru' => 'required|string|max:255',
    //         'no_hp' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //     ]);

    //     $user = auth()->user();

    //     if ($request->hasFile('foto')) {
    //         $imagePath = $request->file('foto')->store('profile_images', 'public');
    //         $user->info()->update(['foto' => $imagePath]);
    //     }

    //     // Update the other user information
    //     $user->info()->update([
    //         'nama' => $request->input('nama'),
    //         'nip_lama' => $request->input('nip_lama'),
    //         'nip_baru' => $request->input('nip_baru'),
    //         'no_hp' => $request->input('no_hp'),
    //         'email' => $request->input('email'),
    //     ]);

    //     return redirect('/dospem/profil')->back()->with('success', 'Profile updated successfully.');
    // }
}
