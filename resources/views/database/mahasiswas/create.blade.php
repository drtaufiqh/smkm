{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<!-- START FORM -->
<form action='{{ url('/admin/mahasiswas') }}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('/admin/mahasiswas') }}" class="btn btn-secondary"><< kembali</a>
        {{-- <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id' value='{{ Session::get('id') }}' id="id">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_user' value='{{ Session::get('id_user') }}' id="id_user">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value='{{ Session::get('nama') }}' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nim' value='{{ Session::get('nim') }}' id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name='email' value='{{ Session::get('email') }}' id="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no_hp' value='{{ Session::get('no_hp') }}' id="no_hp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="foto" value='{{ Session::get('foto') }}' id="foto" accept="image/*">
            </div>
        </div>        
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-control" name='jenis_kelamin' value='{{ Session::get('jenis_kelamin') }}' id="jenis_kelamin">
                    <option value="">Select Here</option>
                    <option value="Laki-laki" @if (Session::get('jenis_kelamin') === "Laki-laki") selected @endif>Laki Laki</option>
                    <option value="Perempuan" @if (Session::get('jenis_kelamin') === "Perempuan") selected @endif>Perempuan</option>
                </select>            
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat_1" class="col-sm-2 col-form-label">Alamat 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat_1' value='{{ Session::get('alamat_1') }}' id="alamat_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_kecamatan_alamat_1" class="col-sm-2 col-form-label">Id Kecamatan Alamat 1</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_kecamatan_alamat_1' value='{{ Session::get('id_kecamatan_alamat_1') }}' id="id_kecamatan_alamat_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat_2" class="col-sm-2 col-form-label">Alamat 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat_2' value='{{ Session::get('alamat_2') }}' id="alamat_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_kecamatan_alamat_2" class="col-sm-2 col-form-label">Id Kecamatan Alamat 2</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_kecamatan_alamat_2' value='{{ Session::get('id_kecamatan_alamat_2') }}' id="id_kecamatan_alamat_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bank" class="col-sm-2 col-form-label">Bank</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='bank' value='{{ Session::get('bank') }}' id="bank">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="an_bank" class="col-sm-2 col-form-label">Atas Nama Bank</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='an_bank' value='{{ Session::get('an_bank') }}' id="an_bank">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_rek" class="col-sm-2 col-form-label">No Rekening</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='no_rek' value='{{ Session::get('no_rek') }}' id="no_rek">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_dosen_pembimbing" class="col-sm-2 col-form-label">Id Dosen Pembimbing</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_dosen_pembimbing' value='{{ Session::get('id_dosen_pembimbing') }}' id="id_dosen_pembimbing">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_pembimbing_lapangan" class="col-sm-2 col-form-label">Id Pembimbing Lapangan</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_pembimbing_lapangan' value='{{ Session::get('id_pembimbing_lapangan') }}' id="id_pembimbing_lapangan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi" class="col-sm-2 col-form-label">Id Instansi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi' value='{{ Session::get('id_instansi') }}' id="id_instansi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      
    </div>
</form>
    <!-- AKHIR FORM -->

</main>
@endsection