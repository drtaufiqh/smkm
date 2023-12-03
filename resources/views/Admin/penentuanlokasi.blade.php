@extends('layouts.main')


@php
  $finalisasiDone = \App\Models\Finalisasi::isFinalisasiPenentuanAdminDone();
  // $finalisasiDone = false;
@endphp

@section('container')
  @include('partials.sidebar-admin')
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penentuan Lokasi Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Penentuan Lokasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title text-lg-center">Penentuan Lokasi oleh Admin</h5>
            @include('komponen.pesan')
              <div class="table-responsive">
                <table class="table datatable text-center">
                  <thead>
                    <tr>
                      <th scope="col">Nomor</th>
                      <th scope="col">Nama Mahasiswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Pilihan 1</th>
                      <th scope="col">Pilihan 2</th>
                      <th scope="col">Domisili Terbaru</th>
                      <th scope="col">Pengajuan Lokasi Magang</th>
                      @if (!$finalisasiDone) <!-- Tampilkan kolom aksi hanya jika finalisasi belum dilakukan -->
                        <th scope="col">Aksi</th>
                      @endif
                      <th scope="col">Lokasi Magang Final</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 0 @endphp
                    @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                    @php $i = $i + 1 @endphp
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                        <td>{{ $pemilihan_lokasi->mahasiswa->jenis_kelamin }}</td>
                        <td>{{ optional($pemilihan_lokasi->pilihan1)->nama ?? '-' }}</td>
                        <td>{{ optional($pemilihan_lokasi->pilihan2)->nama ?? '-' }}</td>
                        <td>{{ ($pemilihan_lokasi->mahasiswa->alamat_1) ?? "-" }}</td>
                        <td id="ajuan_{{ $pemilihan_lokasi->id }}">{{ optional($pemilihan_lokasi->instansiAjuan)->nama ?? "-" }}</td>                        
                        @if (!$finalisasiDone) 
                            <td>
                                {{-- <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_1 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 1</button>
                                </form> --}}
                                <button data-id_lok="{{ $pemilihan_lokasi->id }}" data-id_pil="{{ ($pemilihan_lokasi->id_pilihan_1) }}" data-nama="{{ optional($pemilihan_lokasi->pilihan1)->nama }}" class="btn btn-success mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 1</button>
                                <button data-id_lok="{{ $pemilihan_lokasi->id }}" data-id_pil="{{ ($pemilihan_lokasi->id_pilihan_2) }}" data-nama="{{ optional($pemilihan_lokasi->pilihan2)->nama }}" class="btn btn-secondary mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 2</button>
                                {{-- <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_2 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 2</button>
                                </form> --}}
                            </td>
                        @endif
                        @if ($pemilihan_lokasi->mahasiswa->instansi != NULL)
                          <td>{{ $pemilihan_lokasi->mahasiswa->instansi->nama }}</td>
                        @else
                        <td>-</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
  

      @if (!$finalisasiDone)
      <div class="text-center">
        <form action='/admin/do_finalisasi_lokasi' method="post">
          @csrf 
          @method('PUT')
          <button type="submit" class="btn btn-primary btn-lg">Finalisasi</button>
        </form>
      </div>
      @else
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <i class="bi bi-info-circle me-1"></i>
        Telah dilakukan finalisasi pengajuan lokasi
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
      </div>
      @endif

    </section>

  </main>
@endsection

@section('js-bang')
<script>
  $(document).ready(function() {
      $('.btn-tentukan-lokasi').click(function() {
          var idLok = $(this).data('id_lok');
          var idPil = $(this).data('id_pil');
          var nama = $(this).data('nama');
          var newValue = nama;
          var ajuanElem = $('#ajuan_' + idLok + '');
  
          $.ajax({
              url: '/admin/do_tentukanlokasi/' + idLok + '/' + idPil,
              type: 'GET',
              // data: { new_value: newValue, _token: '{{ csrf_token() }}' },
              success: function (response) {
                  if (response.success) {
                      // Update nilai di tabel
                      console.log(idLok);
                      console.log('ajuanElem length:', ajuanElem.length); // Cek panjang elemen yang dipilih di konsol
                      ajuanElem.text(nama);
                      // alert(response.message);
                  } else {
                      alert('Gagal mengubah nilai.');
                  }
              },
              error: function (error) {
                  console.log(error);
              }
          });
      });
      
      // if (select(".toggle-sidebar-btn")) {
        $(".toggle-sidebar-btn").click(function (e) {
          $("body").toggleClass("toggle-sidebar");
        });
      // }
  });
</script>
@endsection