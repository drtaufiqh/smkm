@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Bimbingan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="mahasiswa-index">Home</a>
            </li>
            <li class="breadcrumb-item active">Jadwal Bimbingan</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row align-items-top justify-content-center">
          <div class="col-5">
            <!-- Card with an i5mage on top -->
            <div class="card h-75">
              <img
                src="assets/img/card.jpg"
                alt="..."
                style="height: 30%; object-fit: cover"
              />

              <div class="card-body">
                <h5 class="card-title">Bimbingan 1</h5>
                <p class="card-text">16 November 2023</p>
                <p class="card-text">16.00 WIB</p>
                <p class="card-text">Sujiwo Tejo</p>
                <a href="#">Ruang Virtual 30</a>
                <div class="text-start mt-3">
                  <button type="button" class="btn btn-primary">Hadir</button>
                </div>
              </div>
              <div
                class="card-footer d-flex justify-content-between bg-dark-light"
              >
                <a href="mahasiswa-bimbingan">Selengkapnya</a>
                <a
                  class="bi bi-arrow-right"
                  href="mahasiswa-bimbingan"
                ></a>
              </div>
            </div>
            <!-- End Card with an image on top -->
          </div>
          <div class="col-5">
            <!-- Card with an i5mage on top -->
            <div class="card h-75">
              <img
                src="assets/img/card.jpg"
                alt="..."
                style="height: 30%; object-fit: cover"
              />

              <div class="card-body">
                <h5 class="card-title">Bimbingan 2</h5>
                <p class="card-text">18 November 2023</p>
                <p class="card-text">16.00 WIB</p>
                <p class="card-text">Sutarno</p>
                <a href="#">Ruang Virtual 10</a>
                <div class="text-start mt-3">
                  <button type="button" class="btn btn-primary">Hadir</button>
                </div>
              </div>
              <div
                class="card-footer d-flex justify-content-between bg-dark-light"
              >
                <a href="mahasiswa-bimbingan">Selengkapnya</a>
                <a
                  class="bi bi-arrow-right"
                  href="mahasiswa-bimbingan"
                ></a>
              </div>
            </div>
            <!-- End Card with an image on top -->
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection