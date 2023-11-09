@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Daftar Bimbingan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bps-instansi-dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="bps-instansi-daftarbimbingan">Daftar Bimbingan</a></li>
          <li class="breadcrumb-item"><a href="bps-instansi-tabelbimbingan">Tabel Bimbingan</a></li>
          <li class="breadcrumb-item active">Edit Daftar Bimbingan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-xl-center">Edit Daftar Bimbingan BPS Kabupaten/Kota</h5>
          <form class="row g-3">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="pemlap" placeholder="pemlap">
                <label for="floatingName">Nama Pembimbing Lapangan</label>
              </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="mhs1" placeholder="mhs1">
                  <label for="floatingName">Nama Mahasisa Bimbingan 1</label>
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="mhs2" placeholder="mhs2">
                <label for="floatingName">Nama Mahasisa Bimbingan 2</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="mhs3" placeholder="mhs3">
                <label for="floatingName">Nama Mahasisa Bimbingan 3</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="mhs4" placeholder="mhs4">
                <label for="floatingName">Nama Mahasisa Bimbingan 4</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="mhs5" placeholder="mhs5">
                <label for="floatingName">Nama Mahasisa Bimbingan 5</label>
              </div>
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Edit Daftar Bimbingan</button>
            </div>
         
          </form><!-- End floating Labels Form -->

        </div>
      </div>



  </main><!-- End #main -->
@endsection