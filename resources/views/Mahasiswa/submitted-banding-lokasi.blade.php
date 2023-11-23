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
            <p>Mohon Menungguu Persetujuan Lebih Lanjut</p>
        </div>
        <div class="waiting-image" style="text-align: center;">
            <img src="{{ asset('assets/img/submitted.jpeg') }}" alt="Gambar Menunggu" style="display: block; margin: 0 auto; width: 600px;">
        </div>                
    </main>
    <!-- End #main -->
@endsection