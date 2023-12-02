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
          <p>Semoga sukses dalam kegiatan magang Anda di</p>
          <h5 class="alert-heading">{{ Auth::user()->info()->instansi->nama }}</h5>
        </div>
      </section>
      <!-- End Pengumuman -->

      <!-- Gambar -->
      <div class="gambar-pengumuman col-6 mx-auto">
        <img
          src="/assets/img/submitted.jpeg"
          class="img-fluid py-2"
          alt="Page Not Found"
        />
      </div>

      <!-- Gambar End -->
    </main>
    <!-- End #main -->
@endsection
