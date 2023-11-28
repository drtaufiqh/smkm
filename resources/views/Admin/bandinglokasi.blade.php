@extends('layouts.main')
@php
  $finalisasiPenentuanBpsProvDone = \App\Models\Finalisasi::isFinalisasiPenentuanBpsProvDone();
  $finalisasiBandingAdminDone = \App\Models\Finalisasi::isFinalisasiBandingAdminDone();
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
                        @if ($finalisasiPenentuanBpsProvDone)
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
                                    @if (!$finalisasiBandingAdminDone)
                                      <th scope="col">Aksi</th>
                                    @endif
                                    <th scope="col">Status</th>
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
                                    <td>{{ optional($pemilihan_lokasi->instansi)->nama ?? '-' }}</td>
                                    <td>{{ optional($pemilihan_lokasi->instansiBanding)->nama ?? '-' }}</td>
                                    <td>{{ $pemilihan_lokasi->alasan_banding }}</td>
                                    @if (!$finalisasiBandingAdminDone)
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

                                      @if ($pemilihan_lokasi->admin_setuju_banding)
                                        <td>
                                            <div class="alert alert-success text-center" role="alert">
                                            Diteruskan
                                            </div>
                                        </td>
                                      @else
                                        @if (!$pemilihan_lokasi->mahasiswa->id_instansi)
                                            <td>-</td>
                                        @else
                                          <td>
                                            <div class="alert alert-danger text-center" role="alert">
                                            Ditolak
                                            </div>
                                          </td>
                                        @endif
                                    @endif

                                  </tr>
                                  @endforeach
                               
                            </tbody>
                        </table>
                      </div>
                        <!-- End Table with stripped rows -->
                        @else
                            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

                                <i class="bi bi-info-circle me-1"></i>
                                BPS Provinsi belum melakukan finalisasi penentuan lokasi mahasiswa.
                                <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close"
                                ></button>
                            </div>
                        @endif

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
@if ($finalisasiPenentuanBpsProvDone)
  @if (!$finalisasiBandingAdminDone)
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
@endif
</section>

  </main><!-- End #main -->
@endsection