@extends('layouts.main')

@php
  $finalisasiBandingAdminDone = \App\Models\Finalisasi::isFinalisasiBandingAdminDone();
  $finalisasiBandingBpsProvDone = Auth::user()->info()->finalisasi->finalisasi_banding_lokasi_bpsprov;
@endphp

@section('container')
    @include('partials.sidebar-prov')

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/bps-provinsi/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Lokasi Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/bps-provinsi/approvalmahasiswa">
              <i class="bi bi-circle"></i><span>Approval Lokasi Mahasiswa</span>
            </a>
          </li>
          <li>
            <a href="/bps-provinsi/bandingmahasiswa" class="active">
              <i class="bi bi-circle"></i><span>Banding Lokasi Mahasiswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Banding Lokasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-provinsi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Lokasi Mahasiswa-Banding</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title text-lg-center">Pengajuan Banding di Provinsi {{ Auth::user()->info()->kabKota->provinsi->nama }}</h5>
                          @include('komponen.pesan')

                          @if ($finalisasiBandingAdminDone)
                          @if (!$finalisasiBandingBpsProvDone)
                          <div class="text-center d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action='/bps-provinsi/do_finalisasi_banding' method="post">
                              @csrf 
                              @method('PUT') <!-- Tambahkan ini untuk menentukan metode PUT -->
                              <button type="submit" class="btn btn-primary btn-mdgi">Finalisasi</button>
                            </form>
                          </div>
                          @else
                          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            Telah dilakukan finalisasi banding lokasi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                        @endif

                          @if ($finalisasiBandingAdminDone)
                          <!-- Table with stripped rows -->
                          <div class="table-responsive">
                          <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Domisili</th>
                                    <th scope="col">BPS Instansi Awal</th>
                                    <th scope="col">BPS Instansi Banding</th>
                                    <th scope="col">Alasan</th>
                                    @if (!$finalisasiBandingBpsProvDone)
                                    <th scope="col">Status</th>
                                    @endif
                                    <th scope="col">BPS Instansi yang Disetujui</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i = 0 @endphp
                              @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                              <tr>
                                  <th scope="row">{{ $i += 1 }}</th>
                                    <td>{{ optional($pemilihan_lokasi->mahasiswa)->nama ?? '-' }}</td>
                                    <td>{{ optional($pemilihan_lokasi->mahasiswa)->nim ?? '-' }}</td>
                                    <td>{{ optional($pemilihan_lokasi->mahasiswa)->alamat_1 ?? '-' }}</td>
                                    <td>{{ optional($pemilihan_lokasi->instansi)->nama ?? '-' }}</td>
                                    <td>{{ optional($pemilihan_lokasi->instansiBanding)->nama ?? '-' }}</td>
                                    <td>{{ ($pemilihan_lokasi->alasan_banding) ?? '-' }}</td>
                                    @if (!$finalisasiBandingBpsProvDone) 
                                    <td>
                                      <form action="/bps-provinsi/do_keputusanbanding/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_instansi_banding }}/setujui" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-success mb-2">Setujui</button>
                                    </form>
                                    
                                    <form action="/bps-provinsi/do_keputusanbanding/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_instansi }}/tidaksetujui" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-danger">Tidak Setujui</button>
                                    </form>
                                    
                                    </td>
                                    @endif
                                    <td>{{ optional($pemilihan_lokasi->mahasiswa->instansi)->nama ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                          <!-- End Table with stripped rows -->
                            @else
                            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

                                <i class="bi bi-info-circle me-1"></i>
                                Admin Politeknik Statistika STIS belum melakukan finalisasi banding lokasi mahasiswa.
                                <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                                ></button>
                            </div>
                        @endif

                </div>
          </div>
      </div>
  </div>

</section>



  </main><!-- End #main -->
@endsection