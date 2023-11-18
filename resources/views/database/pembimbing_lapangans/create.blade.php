{{-- @extends('layout.template') --}}
@extends('layouts.main')
<!-- START DATA -->

{{-- @section('konten') --}}
@section('container')
@include('partials.sidebar-admin')

<main id="main" class="main">
@include('komponen.pesan')
<form action='{{ url('pembimbing_lapangans') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{ url('pembimbing_lapangans') }}" class="btn btn-secondary"> << Kembali</a>
    {{-- Ini id disembunyikan dan tidak diinput karena auto increament --}}
    <!-- {{-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id' value="{{ Session::get('id') }}" id="id">
        </div>
    </div> --}} -->

    {{-- kolom nilai kriteria kinerja --}}
    <div class="mb-3 row">
        <label for="id_user" class="col-sm-2 col-form-label">Id User</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_user' value="{{ Session::get('id_user') }}" id="id_user">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
            <select class="form-control" name='jenis_kelamin' value="{{ Session::get('jenis_kelamin') }}" id="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="laki-laki" @if (Session::get('jenis_kelamin') === "laki-laki") selected @endif>Laki-laki</option>
                <option value="perempuan" @if (Session::get('jenis_kelamin') === "perempuan") selected @endif>Perempuan</option>
        </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nip_lama" class="col-sm-2 col-form-label">NIP Lama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nip_lama' value="{{ Session::get('nip_lama') }}" id="nip_lama">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nip_baru" class="col-sm-2 col-form-label">NIP Baru</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nip_baru' value="{{ Session::get('nip_baru') }}" id="nip_baru">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
        <div class="col-sm-10">
            <select class="form-control" name='golongan' value="{{ Session::get('golongan') }}" id="golongan">
                <option value="">Pilih Golongan</option>
                <option value="Ia" @if (Session::get('golongan') === "Ia") selected @endif>IA</option>
                <option value="Ib" @if (Session::get('golongan') === "Ib") selected @endif>IB</option>
                <option value="Ic" @if (Session::get('golongan') === "Ic") selected @endif>IC</option>
                <option value="Id" @if (Session::get('golongan') === "Id") selected @endif>ID</option>
                <option value="IIa" @if (Session::get('golongan') === "IIa") selected @endif>IIA</option>
                <option value="IIb" @if (Session::get('golongan') === "IIb") selected @endif>IIB</option>
                <option value="IIc" @if (Session::get('golongan') === "IIc") selected @endif>IIC</option>
                <option value="IId" @if (Session::get('golongan') === "IId") selected @endif>IID</option>
                <option value="IIIa" @if (Session::get('golongan') === "IIIa") selected @endif>IIIA</option>
                <option value="IIIb" @if (Session::get('golongan') === "IIIb") selected @endif>IIIB</option>
                <option value="IIIc" @if (Session::get('golongan') === "IIIc") selected @endif>IIIC</option>
                <option value="IIId" @if (Session::get('golongan') === "IIId") selected @endif>IIID</option>
                <option value="IVa" @if (Session::get('golongan') === "IVa") selected @endif>IVA</option>
                <option value="IVb" @if (Session::get('golongan') === "IVb") selected @endif>IVB</option>
                <option value="IVc" @if (Session::get('golongan') === "IVc") selected @endif>IVC</option>
                <option value="IVd" @if (Session::get('golongan') === "IVd") selected @endif>IVD</option>
                <option value="IVe" @if (Session::get('golongan') === "IVe") selected @endif>IVE</option>
        </select>
        </div>
    </div>

    <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jabatan' value="{{ Session::get('jabatan') }}" id="jabatan">
            </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='email' value="{{ Session::get('email') }}" id="email">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="no_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='no_hp' value="{{ Session::get('no_hp') }}" id="no_hp">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_instansi" class="col-sm-2 col-form-label">Id Instansi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_instansi' value="{{ Session::get('id_instansi') }}" id="id_instansi">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='foto' value="{{ Session::get('foto') }}" id="foto">
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