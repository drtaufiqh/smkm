@extends('layouts.main')
@php
  $finalisasi_Banding_Done = \App\Models\Finalisasi::isFinalisasiBandingAdminDone();
  // $finalisasi_Banding_Done = false;
@endphp

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Banding Lokasi Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Banding Lokasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-lg-center">Banding Lokasi oleh Admin</h5>
                        @include('komponen.pesan')

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Domisili</th>
                                    <th scope="col">Lokasi Awal</th>
                                    <th scope="col">Lokasi Banding</th>
                                    <th scope="col">Alasan</th>
                                    @if (!$finalisasi_Banding_Done)
                                      <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                              @php $i = 0 @endphp
                                @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                @php $i = $i + 1 @endphp
                                  <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                                    @if ($pemilihan_lokasi->id_instansi_ajuan != NULL)
                                      <td>{{ $pemilihan_lokasi->instansiAjuan->nama }}</td>
                                    @else
                                      <td>-</td>
                                    @endif
                                    <td>{{ $pemilihan_lokasi->instansiBanding->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->alasan_banding }}</td>
                                    @if (!$finalisasi_Banding_Done)
                                    <td>
                                        <form action="/admin/do_terima_banding/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_instansi_banding }}" method="POST">
                                          @csrf 
                                          @method('PUT')
                                          <button type="submit" class="btn btn-success mb-2" style="color: white;">Teruskan</button>
                                        </form>
                                        <form action="/admin/do_tolak_banding/{{ $pemilihan_lokasi->id }}" method="post">
                                          @csrf
                                          @method('PUT')
                                          <button type="submit" class="btn btn-danger" style="color: white;">Tolak</button>
                                        </form>
                                    </td>
                                    @endif

                                  </tr>
                                  @endforeach
                               
                            </tbody>
                        </table>
                      </div>
                        <!-- End Table with stripped rows -->

                  <!-- Modal Teruskan -->
                  {{-- <div class="modal fade mt-5" id="myModalterus" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog mt-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body text-center">
                                  <h4>Banding Diteruskan ke BPS Provinsi terkait</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Modal Penolakan -->
                {{-- <div class="modal fade mt-5" id="myModaltolak" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog mt-5">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="card-body text-center">
                                <h4>Banding Ditolak dan Tidak Diteruskan ke BPS Provinsi terkait</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> --}}
            </div>
        </div>
    </div>
</div>
@if (!$finalisasi_Banding_Done)
<div class="text-center">
  <form action='/admin/do_finalisasi_banding' method="post">
    @csrf 
    @method('PUT') <!-- Tambahkan ini untuk menentukan metode PUT -->
    <button type="submit" class="btn btn-primary btn-lg">Finalisasi</button>
  </form>
</div>
@else
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

  <i class="bi bi-info-circle me-1"></i>
  Telah dilakukan finalisasi banding lokasi
  <button
    type="button"
    class="btn-close"
    data-bs-dismiss="alert"
    aria-label="Close"
  ></button>
</div>
@endif
</section>

  </main><!-- End #main -->
@endsection