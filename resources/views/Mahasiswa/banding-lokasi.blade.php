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
          <h5 class="alert-heading">{{ Auth::user()->info()->instansi->nama }}</h5>
          <button id="btnKonfirmasi" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Konfirmasi</button>
          <button type="button" class="btn btn-danger btn-banding">
            Banding
          </button>
        </div>
      </section>
      <!-- End Pengumuman -->

      <!-- Modal Konfirmasi -->
      <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Lokasi Magang</h5>
            </div>
            <div class="modal-body">
              <form id="konfirmasiForm" action="/mahasiswa/lokasi-fiks" method="GET">
                @csrf
                <p>Apakah Anda yakin akan mengonfirmasi lokasi magang Anda?</p>
                <!-- Anda bisa menambahkan input atau tombol tambahan di sini sesuai kebutuhan -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Ya</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      

      <!-- Form Banding -->
      <div
        class="form-banding alert-dismissible card col-7 mt-5 mx-auto fade show"
        style="display: none"
      >
        <div class="card-body">
          <!-- Floating Labels Form -->
          <form class="row g-3" action="/mahasiswa/submitted-banding-lokasi/{{ Auth::user()->info()->id }}" method="POST">
            @csrf
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
                  aria-label="Provinsi"
                  disabled
                >
                {{-- @foreach($provinsis as $provinsi) --}}
                  <option value="{{ Auth::user()->info()->instansi->kabKota->provinsi->id }}">{{ Auth::user()->info()->instansi->kabKota->provinsi->nama }}</option>
                {{-- @endforeach --}}
                </select>
                <label for="floatingSelect">Provinsi</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select
                  class="form-select"
                  id="floatingSelect"
                  aria-label="Instansi"
                  name="id_instansi_banding"
                >
                @foreach($instansis as $instansi)
                  <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                @endforeach
                </select>
                <label for="floatingSelect">Instansi</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea
                  class="form-control"
                  placeholder="Alasan"
                  id="floatingTextarea"
                  style="height: 80px"
                  name="alasan_banding"
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
          src="/assets/img/not-found.svg"
          class="img-fluid py-2"
          alt="Page Not Found"
        />
      </div>

      <!-- Gambar End -->
    </main>
    <!-- End #main -->
@endsection
