@extends('layouts.main')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@php
  $finalisasiPenentuanAdminDone = \App\Models\Finalisasi::isFinalisasiPenentuanAdminDone();
  $finalisasiPenentuanBpsProvDone = \App\Models\Finalisasi::isFinalisasiPenentuanBpsProvDone();
@endphp

@section('container')
    @include('partials.sidebar-prov')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Approval Lokasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-provinsi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Lokasi Mahasiswa-Approval</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title text-lg-center">Pengajuan di Provinsi {{ Auth::user()->info()->kabKota->provinsi->nama }}</h5>
                          @include('komponen.pesan')

                          @if ($finalisasiPenentuanAdminDone)
  
                          @if (!Auth::user()->info()->finalisasi->finalisasi_penentuan_lokasi_bpsprov)
                          <div class="text-center d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action='/bps-provinsi/do_finalisasi_pemilihan' method="post">
                              @csrf 
                              @method('PUT') <!-- Tambahkan ini untuk menentukan metode PUT -->
                              <button type="submit" class="btn btn-primary btn-md">Finalisasi</button>
                            </form>
                          </div>
                          @else
                          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            Telah dilakukan finalisasi pemilihan lokasi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                        @endif

                            @if ($finalisasiPenentuanAdminDone)
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                            <table class="table datatable text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Domisili</th>
                                        <th scope="col">Lokasi Magang Ajuan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Lokasi Magang Pengalihan</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 0 @endphp
                                @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                <tr>
                                    <th scope="row">{{ $i += 1 }}</th>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nim }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                                    <td>{{ optional($pemilihan_lokasi->instansiAjuan)->nama ?? '-' }}</td>
                                    @if (!$finalisasiPenentuanBpsProvDone)
                                        <td class="status-column">
                                            {{-- <form action="{{ route('setujuiPemilihan', ['id' => $pemilihan_lokasi->id, 'provId' => Auth::user()->info()->kabKota->provinsi->id]) }}" method="post">
                                                @csrf
                                                @method('PUT') --}}
                                            <form id="setujuiForm_{{ $pemilihan_lokasi->id }}" class="setujui-form" data-pemilihan-id="{{ $pemilihan_lokasi->id }}">
                                              <button type="button" class="btn btn-outline-success mb-2 setujui-btn">Setujui</button>
                                            </form>
                                            
                                            <form action="{{ route('tolakPemilihan', ['id' => $pemilihan_lokasi->id, 'provId' => Auth::user()->info()->kabKota->provinsi->id]) }}" method="post">
                                              @csrf
                                              @method('PUT')
                                              <button type="submit" class="btn btn-outline-danger">Alihkan</button>
                                          </form>
                                          
                                        </td>
                                    @else
                                        @if (!$pemilihan_lokasi->id_pengalihan)
                                        <td>
                                            <div class="alert alert-success text-center" role="alert">
                                            Disetujui
                                            </div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="alert alert-danger text-center" role="alert">
                                            Dialihkan
                                            </div>
                                          </td>
                                        @endif
                                    @endif
                                    <td id="pengalihan_{{ $pemilihan_lokasi->id }}">{{ optional($pemilihan_lokasi->instansiPengalihan)->nama ?? '-' }}</td>
                                    @if ($pemilihan_lokasi->id_instansi && !$pemilihan_lokasi->instansiPengalihan)
                                      <td id="keterangan_{{ $pemilihan_lokasi->id }}">
                                          <div class="alert alert-success text-center" role="alert">
                                          Disetujui
                                          </div>
                                      </td>
                                    @else
                                      <td id="keterangan_{{ $pemilihan_lokasi->id }}">{{ ($pemilihan_lokasi->keterangan) ?? '-' }}</td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                          {{ $pemilihan_lokasis->withQueryString()->links() }}
                          <!-- End Table with stripped rows -->
                            @else
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

                                    <i class="bi bi-info-circle me-1"></i>
                                    Admin Politeknik Statistika STIS belum melakukan finalisasi penentuan lokasi mahasiswa.
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

@section('js-bang')
<script>
    $(document).ready(function () {
        $('.setujui-btn').on('click', function () {
            var pemilihanId = $(this).closest('.setujui-form').data('pemilihan-id');

            $.ajax({
                type: 'GET',
                url: '/bps-provinsi/setujui-pemilihan/' + pemilihanId + '/' + {{ Auth::user()->info()->kabKota->provinsi->id }},
                // data: $(this).closest('.setujui-form').serialize(),
                success: function (response) {
                    // Tambahkan logika atau manipulasi DOM setelah permintaan berhasil
                    $('#pengalihan_' + pemilihanId).text('-')
                    $('#keterangan_' + pemilihanId).html('<div class="alert alert-success text-center" role="alert">Disetujui</div>')
                    console.log(response);
                },
                error: function (error) {
                    // Tambahkan logika atau manipulasi DOM setelah permintaan gagal
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection