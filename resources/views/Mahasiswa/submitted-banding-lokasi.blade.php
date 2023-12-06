@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Lokasi Magang</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/mahasiswa/index">Home</a>
                </li>
                <li class="breadcrumb-item active">Lokasi</li>
              </ol>
            </nav>
          </div>
          <div class="waiting-text" style="text-align: center; font-weight: bold; font-size: 24px;">
            <p>Mohon Menunggu Persetujuan Lebih Lanjut</p>
            <p>Lokasi Magang Awal: {{ $pemilihan_lokasi->instansi->nama }}</p>
            <p>Lokasi Magang Banding: {{ $pemilihan_lokasi->instansiBanding->nama }}</p>
        </div>
        <div class="waiting-image" style="text-align: center;">
            <img src="{{ url('/assets/img/submitted.png') }}" alt="Gambar Menunggu" style="display: block; margin: 0 auto; width: 600px;">
        </div>                
    </main>
    <!-- End #main -->
@endsection