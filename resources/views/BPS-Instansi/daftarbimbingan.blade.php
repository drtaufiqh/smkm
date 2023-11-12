@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Bimbingan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Daftar Bimbingan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-xl-center">Daftar Bimbingan BPS Kabupaten/Kota</h5>

          <div class="mb-3">
            <label for="pemlap"><b>Nama Pembimbing Lapangan</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="pemlap" name="pemlap">
                <option selected>Pilih Pembimbing Lapangan</option>
                <option value="pemlap1">Pembimbing Lapangan 1</option>
                <option value="pemlap2">Pembimbing Lapangan 2</option>
                <option value="pemlap3">Pembimbing Lapangan 3</option>
              </select>
          </div>
          <div class="mb-3">
            <label for="mhs1"><b>Nama Mahasiswa Bimbingan 1</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="mhs1" name="mhs1">
                <option selected>Pilih Mahasiswa Pertama</option>
                <option value="mahasiswa1">Mahasiswa 1</option>
                <option value="mahasiswa2">Mahasiswa 2</option>
                <option value="mahasiswa3">Mahasiswa 3</option>
              </select>
          </div>
          <div class="mb-3">
            <label for="mhs2"><b>Nama Mahasiswa Bimbingan 2</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="mhs2" name="mhs2">
                <option selected>Pilih Mahasiswa Kedua</option>
                <option value="mahasiswa1">Mahasiswa 1</option>
                <option value="mahasiswa2">Mahasiswa 2</option>
                <option value="mahasiswa3">Mahasiswa 3</option>
              </select>
          </div>
          <div class="mb-3">
            <label for="mhs3"><b>Nama Mahasiswa Bimbingan 3</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="mhs3" name="mhs3">
                <option selected>Pilih Mahasiswa Ketiga</option>
                <option value="mahasiswa1">Mahasiswa 1</option>
                <option value="mahasiswa2">Mahasiswa 2</option>
                <option value="mahasiswa3">Mahasiswa 3</option>
              </select>
          </div>
          <div class="mb-3">
            <label for="mhs4"><b>Nama Mahasiswa Bimbingan 4</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="mhs4" name="mhs4">
                <option selected>Pilih Mahasiswa Keempat</option>
                <option value="mahasiswa1">Mahasiswa 1</option>
                <option value="mahasiswa2">Mahasiswa 2</option>
                <option value="mahasiswa3">Mahasiswa 3</option>
              </select>
          </div>
          <div class="mb-3">
            <label for="mhs5"><b>Nama Mahasiswa Bimbingan 5</b></label>
              <select class="form-select fst-italic" aria-label="Default select example" id="mhs5" name="mhs5">
                <option selected>Pilih Mahasiswa Kelima</option>
                <option value="mahasiswa1">Mahasiswa 1</option>
                <option value="mahasiswa2">Mahasiswa 2</option>
                <option value="mahasiswa3">Mahasiswa 3</option>
              </select>
          </div>
          
          
    
          
            <div class="text-center">
              <a href="/bps-instansi/tabelbimbingan" class="btn btn-warning" style="color: white;">Tabel Daftar Bimbingan</a>
              <button type="submit" class="btn btn-primary">Sumbit</button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>



  </main><!-- End #main -->
@endsection