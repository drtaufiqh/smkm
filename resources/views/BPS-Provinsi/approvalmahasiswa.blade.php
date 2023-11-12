@extends('layouts.main')

@section('container')
    @include('partials.sidebar-prov')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Approval Lokasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bps-provinsi-dashboard">Home</a></li>
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
                                      <th scope="col">BPS Kab/Kota Pilihan</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">BPS Kab/Kota Pengalihan</th>
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
                                    <td>{{ $pemilihan_lokasi->pilihan1->nama }}</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                    <td>{{ $pemilihan_lokasi->pilihan2->nama }}</td>
                                    <td>-</td>
                                </tr>
                                @endforeach
                                  {{-- <tr>
                                      <th scope="row">1</th>
                                      <td>Andi</td>
                                      <td>123456789</td>
                                      <td>Jakarta Timur</td>
                                      <td>BPS Jakarta Timur</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  </tr>
                                  <th scope="row">2</th>
                                      <td>Budi</td>
                                      <td>222222222</td>
                                      <td>Jakarta Barat</td>
                                      <td>BPS Jakarta Timur</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  </tr>
                                  <th scope="row">3</th>
                                      <td>Caca</td>
                                      <td>333333333</td>
                                      <td>Jakarta Pusat</td>
                                      <td>BPS Jakarta Pusat</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  <tr>
                                  <th scope="row">4</th>
                                      <td>Dono</td>
                                      <td>444444444</td>
                                      <td>Jakarta Utara</td>
                                      <td>BPS Jakarta Utara</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  </tr>
                                  <tr>
                                  <th scope="row">5</th>
                                      <td>Ela</td>
                                      <td>555555555</td>
                                      <td>Jakarta Barat</td>
                                      <td>BPS Jakarta Barat</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  </tr>
                                  <tr>
                                      <th scope="row">6</th>
                                      <td>Feny</td>
                                      <td>666666666</td>
                                      <td>Jakarta Selatan</td>
                                      <td>BPS Jakarta Selatan</td>
                                      <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Diajukan</button></td>
                                      <td>-</td>
                                      <td>-</td>
                                  </tr> --}}
                              </tbody>
                          </table>\
                          </div>
                          <!-- End Table with stripped rows -->

                    <!-- Modal -->
                    <div class="modal fade mt-5" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog mt-5">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Approval Pengajuan Mahasiswa</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="card-body text-center">
                                      <p class="card-text">
                                          <a href="#" class="btn btn-success mx-4" data-bs-toggle="modal" >Setujui</a>
                                          <a href="#" class="btn btn-danger mx-4" data-bs-toggle="modal" data-bs-target="#tidakSetujuiModal">Tidak Setujui</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

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
                                    <label for="pengalihan">BPS Kabupaten/Kota Pengalihan</label>
                                      <select class="form-select" aria-label="Default select example" id="pengalihan" name="pengalihan">
                                        <option selected>Pilih Kabupaten/Kota</option>
                                        <option value="kabupaten1">BPS Kabupaten 1</option>
                                        <option value="kabupaten2">BPS Kabupaten 2</option>
                                        <option value="kabupaten3">BPS Kabupaten 3</option>
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
                                  <button type="button" class="btn btn-danger">Kirim</button>
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


  </main><!-- End #main -->
@endsection