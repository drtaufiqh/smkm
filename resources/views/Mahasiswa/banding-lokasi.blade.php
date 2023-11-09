@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <!-- Pengumuman -->
      <div class="pagetitle">
        <h1 class="text-center">Pengumuman Lokasi Magang</h1>
      </div>
      <section class="section my-auto">
        <div
          class="alert alert-primary alert-dismissible fade show col-10 mx-auto text-center"
          role="alert"
        >
          <h4 class="alert-heading">Selamat!</h4>
          <p>Lokasi magang Anda adalah</p>
          <h5 class="alert-heading">BPS Kota Mojokerto</h5>
          <hr />
          <button type="button" class="btn btn-success">Konfirmasi</button>
          <button type="button" class="btn btn-danger btn-banding">
            Banding
          </button>
        </div>
      </section>
      <!-- End Pengumuman -->

      <!-- Form Banding -->
      <div
        class="form-banding alert-dismissible card col-7 mt-5 mx-auto fade show"
        style="display: none"
      >
        <div class="card-body">
          <!-- Floating Labels Form -->
          <form class="row g-3">
            <h5 class="card-title">Lokasi Banding</h5>
            <button
              type="button"
              class="btn-close btn-cls-banding"
              data-bs-dismiss="alert"
              aria-label="Close"
            ></button>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select
                  class="form-select"
                  id="floatingSelect"
                  aria-label="Eselon 1"
                  disabled
                >
                  <option selected>Jatim</option>
                  <option value="1">Jatim</option>
                  <option value="2">Jateng</option>
                </select>
                <label for="floatingSelect">Eselon 1</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select
                  class="form-select"
                  id="floatingSelect"
                  aria-label="Eselon 1"
                >
                  <option selected>Surabaya</option>
                  <option value="1">Ponorogo</option>
                  <option value="2">Surabaya</option>
                </select>
                <label for="floatingSelect">Eselon 2</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea
                  class="form-control"
                  placeholder="Alasan"
                  id="floatingTextarea"
                  style="height: 80px"
                ></textarea>
                <label for="floatingTextarea">Alasan</label>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End floating Labels Form -->

      <!-- Gambar -->
      <div class="gambar-pengumuman col-6 mx-auto">
        <img
          src="assets/img/not-found.svg"
          class="img-fluid py-2"
          alt="Page Not Found"
        />
      </div>

      <!-- Gambar End -->
    </main>
    <!-- End #main -->
@endsection
