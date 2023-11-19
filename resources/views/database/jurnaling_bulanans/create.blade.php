{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('/admin/jurnaling_bulanans') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('/admin/jurnaling_bulanans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">id</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}}

    <div class="mb-3 row">
        <label for="periode" class="col-sm-2 col-form-label">Periode</label>
        <div class="col-sm-10">
            <select class="form-control" name='periode' value="{{ Session::get('periode') }}" id="periode">
                <option value="">Pilih periode</option>
                <option value="1" @if (Session::get('periode') === "1") selected @endif>1</option>
                <option value="2" @if (Session::get('periode') === "2") selected @endif>2</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_mhs" class="col-sm-2 col-form-label">Mahasiswa</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_mhs' value="{{ Session::get('id_mhs') }}" id="id_mhs">
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}" @if (Session::get('id_mhs') == $mahasiswa->id) selected @endif>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="id_penilai" class="col-sm-2 col-form-label">Pembimbing Lapangan</label>
        <div class="col-sm-10">
            <select class="form-control" name='id_penilai' value="{{ Session::get('id_penilai') }}" id="id_penilai">
                <option value="">Pilih Pembimbing Lapangan</option>
                @foreach ($pembimbing_lapangans as $pembimbing_lapangan)
                    <option value="{{ $pembimbing_lapangan->id }}" @if (Session::get('id_penilai') == $pembimbing_lapangan->id) selected @endif>{{ $pembimbing_lapangan->nip_baru }} - {{ $pembimbing_lapangan->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- URAIAN KEGIATAN --}}
    <div class="mb-3 row">
        <label for="uraian_kegiatan" class="col-sm-2 col-form-label">Uraian kegiatan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='uraian_kegiatan' value="{{ Session::get('uraian_kegiatan') }}" id="uraian_kegiatan">
        </div>
    </div>
    {{-- SATUAN --}}
    <div class="mb-3 row">
        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='satuan' value="{{ Session::get('satuan') }}" id="satuan">
        </div>
    </div>
   {{-- KUANTITAS TARGET --}}
    <div class="mb-3 row">
        <label for="kuantitas_target" class="col-sm-2 col-form-label">Kuantitas Target</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_target' value="{{ Session::get('kuantitas_target') }}" id="kuantitas_target">
        </div>
    </div>
    {{-- KUANTITAS REALISASI --}}
    <div class="mb-3 row">
        <label for="kuantitas_realisasi" class="col-sm-2 col-form-label">Kuantitas Realisasi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='kuantitas_realisasi' value="{{ Session::get('kuantitas_realisasi') }}" id="kuantitas_realisasi">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tingkat_kuantitas" class="col-sm-2 col-form-label">Tingkat Kuantitas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='tingkat_kuantitas' value="{{ Session::get('tingkat_kuantitas') }}" id="tingkat_kuantitas">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tingkat_kualitas" class="col-sm-2 col-form-label">Tingkat Kualitas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='tingkat_kualitas' value="{{ Session::get('tingkat_kualitas') }}" id="tingkat_kualitas">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='keterangan' value="{{ Session::get('keterangan') }}" id="keterangan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="status_final_mhs" class="col-sm-2 col-form-label">status_final_mhs</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_mhs' value="{{ Session::get('status_final_mhs') }}" id="status_final_mhs">
                <option value="">Pilih status_final_mhs</option>
                <option value="0" @if (Session::get('status_final_mhs') == 0) selected @endif>0</option>
                <option value="1" @if (Session::get('status_final_mhs') == 1) selected @endif>1</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="status_final_penilai" class="col-sm-2 col-form-label">status_final_penilai</label>
        <div class="col-sm-10">
            <select class="form-control" name='status_final_penilai' value="{{ Session::get('status_final_penilai') }}" id="status_final_penilai">
                <option value="">Pilih status_final_penilai</option>
                <option value="0" @if (Session::get('status_final_penilai') == 0) selected @endif>0</option>
                <option value="1" @if (Session::get('status_final_penilai') == 1) selected @endif>1</option>
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