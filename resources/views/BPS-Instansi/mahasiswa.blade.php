@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Mahasiswa Magang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Mahasiswa Magang BPS Kabupaten/Kota</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-lg-center">Mahasiswa di BPS Kabupaten/Kota</h5>
                          <!-- Table with stripped rows -->
                          <div class="table-responsive">
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">Nomor</th>
                                      <th scope="col">Nama Mahasiswa</th>
                                      <th scope="col">Rekening</th>
                                      <th scope="col">Jenis Bank</th>
                                      <th scope="col">Nama Pembimbing Lapangan</th>
                                      <th scope="col">Form Rekap Presensi</th>
                                      <th scope="col">Presensi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @php $i = 0 @endphp
                                @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                  <th scope="row">{{ $i += 1 }}</th>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->no_rek }}</td>
                                    <td>{{ $mahasiswa->bank }}</td>
                                    <td>{{ $mahasiswa->PembimbingLapangan->nama }}</td>
                                    <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                </tr>
                                @endforeach
                                  {{-- <tr>
                                      <th scope="row">1</th>
                                      <td>Andi</td>
                                      <td>123456789</td>
                                      <td>BCA</td>
                                      <td>Anang</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                    
                                  </tr>
                                  <th scope="row">2</th>
                                      <td>Budi</td>
                                      <td>222222222</td>
                                      <td>BSI</td>
                                      <td>Boni</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                     
                                  </tr>
                                  <th scope="row">3</th>
                                      <td>Caca</td>
                                      <td>333333333</td>
                                      <td>Mandiri</td>
                                      <td>Charles</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                    
                                  <tr>
                                  <th scope="row">4</th>
                                      <td>Dono</td>
                                      <td>444444444</td>
                                      <td>BRI</td>
                                      <td>Danang</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                  </tr>
                                  <tr>
                                  <th scope="row">5</th>
                                      <td>Ela</td>
                                      <td>555555555</td>
                                      <td>BNI</td>
                                      <td>Erna</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                      
                                  </tr>
                                  <tr>
                                      <th scope="row">6</th>
                                      <td>Feny</td>
                                      <td>666666666</td>
                                      <td>BSI</td>
                                      <td>Fely</td>
                                      <td><button type="button" class="btn btn-primary" style="color: white;" data-bs-toggle="modal" data-bs-target="#formmodal">Form Presensi</button></td>
                                      <td>
                                        <a href="/bps-instansi/presensimahasiswa">
                                          <button type="button" class="btn btn-primary" style="color: white;">Lihat</button>
                                        </a>
                                      </td>
                                      
                                  </tr> --}}
                              </tbody>
                          </table>
                        </div>
                          <!-- End Table with stripped rows -->

                         
                    <!-- Form Modal -->
                    <div class="modal fade" id="formmodal" tabindex="-1" aria-labelledby="tidakSetujuiModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pengisian Rekapitulasi Presensi Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div class="mb-3">
                                        <label for="hadir">Hadir</label>
                                        <input type="number" class="form-control" id="hadir" name="hadir" min="0" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hadir">Absen</label>
                                        <input type="number" class="form-control" id="absen" name="absen" min="0" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hadir">Terlambat A</label>
                                        <input type="number" class="form-control" id="terlambata" name="terlambata" min="0" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hadir">Terlambat B</label>
                                        <input type="number" class="form-control" id="terlambatb" name="terlambatb" min="0" max="100">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hadir">Izin</label>
                                        <input type="number" class="form-control" id="izin" name="izin" min="0" max="100">
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
</section>

  </main><!-- End #main -->
@endsection