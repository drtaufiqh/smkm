{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<!-- START FORM -->
<form action='{{ url('/admin/pemilihan_lokasis') }}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('/admin/pemilihan_lokasis') }}" class="btn btn-secondary"><< kembali</a>
        {{-- <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id' value='{{ Session::get('id') }}' id="id">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="id_mhs" class="col-sm-2 col-form-label">Id Mahasiswa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_mhs' value='{{ Session::get('id_mhs') }}' id="id_mhs">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_pilihan_1" class="col-sm-2 col-form-label">Id Pilihan 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_pilihan_1' value='{{ Session::get('id_pilihan_1') }}' id="id_pilihan_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_pilihan_2" class="col-sm-2 col-form-label">Id Pilihan 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_pilihan_2' value='{{ Session::get('id_pilihan_2') }}' id="id_pilihan_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_pilihan_1" class="col-sm-2 col-form-label">Alasan Pilihan 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_pilihan_1' value='{{ Session::get('alasan_pilihan_1') }}' id="alasan_pilihan_1">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_pilihan_2" class="col-sm-2 col-form-label">Alasan Pilihan 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_pilihan_2' value='{{ Session::get('alasan_pilihan_2') }}' id="alasan_pilihan_2">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi_ajuan" class="col-sm-2 col-form-label">Id Instansi Ajuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi_ajuan' value='{{ Session::get('id_instansi_ajuan') }}' id="id_instansi_ajuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi_banding" class="col-sm-2 col-form-label">Id Instansi Banding</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi_banding' value='{{ Session::get('id_instansi_banding') }}' id="id_instansi_banding">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alasan_banding" class="col-sm-2 col-form-label">Alasan Banding</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alasan_banding' value='{{ Session::get('alasan_banding') }}' id="alasan_banding">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="id_instansi" class="col-sm-2 col-form-label">Id Kab/Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_instansi' value='{{ Session::get('id_instansi') }}' id="id_instansi">
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