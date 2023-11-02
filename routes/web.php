<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard-prov');
});

Route::get('/provinsi/hhh', function () {
    return view('dashboard-prov');
});

Route::get('/a', function () {
    return view('banding-lokasi');
});
Route::get('/provinsi', function () {
    return view('approval-mahasiswa');
});
