{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<!-- START FORM -->
<form action='{{ url('/admin/instansis') }}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('/admin/instansis') }}" class="btn btn-secondary"><< kembali</a>
        {{-- <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id' value='{{ Session::get('id') }}' id="id">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_user' value='{{ Session::get('id_user') }}' id="id_user">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value='{{ Session::get('nama') }}' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_kecamatan" class="col-sm-2 col-form-label">Id Kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_kecamatan' value='{{ Session::get('id_kecamatan') }}' id="id_kecamatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat_lengkap' value='{{ Session::get('alamat_lengkap') }}' id="alamat_lengkap">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="is_prov" class="col-sm-2 col-form-label">Is Provinsi</label>
            <div class="col-sm-10">
                <select class="form-control" name='is_prov' id="is_prov">
                    <option value="">Select Here</option>
                    <option value="0" @if (Session::get('is_prov') == "0") selected @endif>0</option>
                    <option value="1" @if (Session::get('is_prov') == "1") selected @endif>1</option>
                </select>            
            </div>
        </div>        
        {{-- <div class="mb-3 row">
            <label for="id_kabkota" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-10">
                <select class="form-control" name='kolom_dropdown_contoh' value="{{ Session::get('id_kabkota') }}" id="id_kabkota">
                    <option value="">Select Kab/Kota</option>
                    <option value="option1" @if (Session::get('id_kabkota') === "option1") selected @endif>option1</option>
                    <option value="option2" @if (Session::get('id_kabkota') === "option2") selected @endif>option2</option>
                    <option value="option3" @if (Session::get('id_kabkota') === "option3") selected @endif>option3</option>
                    <option value="option4" @if (Session::get('id_kabkota') === "option4") selected @endif>option4</option>
                    <option value="option5" @if (Session::get('id_kabkota') === "option5") selected @endif>option5</option>
                    <option value="option6" @if (Session::get('id_kabkota') === "option6") selected @endif>option6</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
      
    </div>
</form>
    <!-- AKHIR FORM -->
</main>
@endsection