{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/kartu_kendalis') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/kartu_kendalis') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="id_bimbingan" class="col-sm-2 col-form-label">Id Bimbingan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_bimbingan' value="{{ Session::get('id_bimbingan') }}" id="id_bimbingan">
        </div>
    </div>

    <!-- <div class="mb-3 row">
        <label for="id_bimbingan" class="col-sm-2 col-form-label">Id Bimbingan</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_bimbingan' value="{{ Session::get('id_bimbingan') }}" id="id_bimbingan">
                <option value="">Pilih Id Bimbingan</option>
                @foreach ($kartu_kendalis as $kartu_kendali )
                <option value="{{ $kartu_kendali->id }}" @if (Session::get('id_bimbingan') === $kartu_kendali->id) selected @endif>
                    {{ $kartu_kendali->someTextProperty }}
                </option>
                @endforeach
            </select>
        </div>
    </div> -->

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_mhs' value="{{ Session::get('id_mhs') }}" id="id_mhs">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mahasiswa )
                    <option value="{{ $mahasiswa->id }}" @if (Session::get('id_mhs') === $mahasiswa->id) selected @endif>{{ $mahasiswa->nim }}-{{ $mahasiswa->nama }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Diketahui</label>
        <div class="col-sm-10">
            <select class="form-control" name='diketahui' value="{{ Session::get('diketahui') }}" id="diketahui">
                <option value="">Pilih Status</option>
                <option value="0" @if (Session::get('diketahui') === "0") selected @endif>Disetujui</option>
                <option value="1" @if (Session::get('diketahui') === "1") selected @endif>Belum Disetuui</option>
            </select>
        </div>
    </div>

    {{-- ini contoh input type text --}}
    <div class="mb-3 row">
        <label for="pokok_bahasan" class="col-sm-2 col-form-label">Pokok Bahasan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='pokok_bahasan' value="{{ Session::get('pokok_bahasan') }}" id="pokok_bahasan">
        </div>
    </div>

    {{-- ini tombol simpan --}}
    <div class="mb-3 row">
        <label for="simpan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->

</main>
@endsection