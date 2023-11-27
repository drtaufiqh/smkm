@extends('layouts.main')

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
                          <h5 class="card-title text-lg-center">Pengajuan di BPS Provinsi Jakarta</h5>
                          <!-- Table with stripped rows -->
                          <div class="table-responsive">
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">Nomor</th>
                                      <th scope="col">Nama Mahasiswa</th>
                                      <th scope="col">NIM</th>
                                      <th scope="col">Domisili</th>
                                      <th scope="col">BPS Instansi Pilihan</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">BPS yang Disetujui</th>
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
                                    <td>{{ $pemilihan_lokasi->instansiAjuan->nama }}</td>
                                    <td class="status-column">
                                        <form action="/bps-provinsi/setujui-pemilihan/{{ $pemilihan_lokasi->id }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success mx-4">Setujui</button>
                                        </form>
                                        <a href="#" class="btn btn-danger mx-4" data-bs-toggle="modal" data-bs-target="#tidakSetujuiModal">Tidak Setujui</a>
                                    </td>
                                    <td>{{ $pemilihan_lokasi->instansi->nama }}</td>
                                    <td>-</td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                          </div>
                          <!-- End Table with stripped rows -->

                  <!-- Modal untuk "Tidak Setujui" -->
                  <div class="modal fade mt-5" id="tidakSetujuiModal" tabindex="-1" aria-labelledby="tidakSetujuiModalLabel" aria-hidden="true">
                      <div class="modal-dialog mt-5">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Pengalihan Pengajuan Mahasiswa</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="mb-3">
                                    <label for="pengalihan">BPS Instansi Pengalihan</label>
                                      <select class="form-select" aria-label="Default select example" id="pengalihan" name="pengalihan">
                                        <option selected>Pilih BPS Instansi</option>
                                        @foreach($instansis as $instansi)
                                            <option value="{{ $instansi->nama }}">{{ $instansi->nama }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="mb-3">
                                      <label for="alasan">Alasan Tidak Setujui</label>
                                      <textarea class="form-control" id="alasan" name="alasan" rows="3"></textarea>
                                  </div>
                              </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-danger">Kirim</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="text-center">
    <button type="button" class="btn btn-primary btn-lg">Finalisasi</button>
  </div>
</section>

{{-- <script>
    $(document).ready(function() {
        // Menangani klik pada tombol "Setujui" di setiap baris
        $('.btn-setujui').click(function() {
            var pemilihanId = $(this).data('id');
            $('#setujuiLink').attr('href', '/bps-provinsi/setujuiPemilihan/' + pemilihanId);
        });

        // Menangani klik pada tombol "Setujui" di modal
        $('.btn-setujui-modal').click(function() {
            // Lakukan sesuatu ketika tombol "Setujui" di modal diklik
        });
    });
</script> --}}

  </main><!-- End #main -->
@endsection