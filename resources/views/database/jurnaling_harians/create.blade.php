{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('jurnaling_harians') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('jurnaling_harians') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

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
        <label for="id_mhs" class="col-sm-2 col-form-label">Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_penilai' value="{{ Session::get('id_penilai') }}" id="id_penilai">
                <option value="">Pilih Penilai</option>
                @foreach ($pembimbing_lapangans as $pembimbingLapangan)
                    <option value="{{ $pembimbingLapangan->id }}" @if (Session::get('id_penilai') === $pembimbingLapangan->id) selected @endif>{{ $pembimbingLapangan->nip_baru }}-{{ $pembimbingLapangan->nama }}</option>
                    <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal' value="{{ Session::get('tanggal') }}" id="tanggal">
        </div>
    </div>

    {{-- kolom deskripsi pekerjaan --}}
    <div class="mb-3 row">
        <label for="deskripsi_pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='deskripsi_pekerjaan' value="{{ Session::get('deskripsi_pekerjaan') }}" id="deskripsi_pekerjaan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kuantitas_volume" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_volume' value="{{ Session::get('kuantitas_volume') }}" id="kuantitas_volume">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kuantitas_satuan" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_satuan' value="{{ Session::get('kuantitas_satuan') }}" id="kuantitas_satuan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="durasi_waktu" class="col-sm-2 col-form-label">Durasi Waktu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='durasi_waktu' value="{{ Session::get('durasi_waktu') }}" id="durasi_waktu">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="pemberi_tugas" class="col-sm-2 col-form-label">Pemberi Tugas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='pemberi_tugas' value="{{ Session::get('pemberi_tugas') }}" id="pemberi_tugas">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_penyelesaian" class="col-sm-2 col-form-label">Status Penyelesaian</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='status_penyelesaian' value="{{ Session::get('status_penyelesaian') }}" id="status_penyelesaian">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_final_mhs'" class="col-sm-2 col-form-label">Status Final Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_mhs' value="{{ Session::get('status_final_mhs') }}" id="status_final_mhs">
                <option value="">Tentukan Status</option>
                <option value="0" @if (Session::get('status_final_mhs') === 0) selected @endif>0</option>
                <option value="1" @if (Session::get('status_final_mhs') === 1) selected @endif>1</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_final_penilai" class="col-sm-2 col-form-label">Status Final Penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_penilai' value="{{ Session::get('status_final_penilai') }}" id="status_final_penilai">
                <option value="">Tentukan Status</option>
                <option value="0" @if (Session::get('status_final_penilai') === 0) selected @endif>0</option>
                <option value="1" @if (Session::get('status_final_penilai') === 1) selected @endif>1</option>
            </select>
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