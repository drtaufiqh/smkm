{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/users') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/users') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='username' value="{{ Session::get('username') }}" id="username">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ Session::get('email') }}" id="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name='password' value="" id="password">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">role</label>
        <div class="col-sm-10">
            <select class="form-control" name='role' value="{{ Session::get('role') }}" id="role">
                <option value="">Select Role</option>
                <option value="admin" @if (Session::get('role') === "admin") selected @endif>Admin</option>
                <option value="prov" @if (Session::get('role') === "prov") selected @endif>BPS Provinsi</option>
                <option value="instansi" @if (Session::get('role') === "instansi") selected @endif>BPS Instansi</option>
                <option value="mhs" @if (Session::get('role') === "mhs") selected @endif>Mahasiswa</option>
                <option value="dospem" @if (Session::get('role') === "dospem") selected @endif>Dosen Pembimbing</option>
                <option value="pemlap" @if (Session::get('role') === "pemlap") selected @endif>Pembimbing Lapangan</option>
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
</main>
@endsection