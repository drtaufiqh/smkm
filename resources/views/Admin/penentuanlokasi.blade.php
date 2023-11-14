@extends('layouts.main')

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
                        <!-- Table with stripped rows -->
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
                                    <th scope="col">Pengajuan Lokasi Magang Final</th>
                                    <th scope="col">Aksi</th>
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
                                  <td>{{ $pemilihan_lokasi->pilihan1->nama }}</td>
                                  <td>{{ $pemilihan_lokasi->pilihan2->nama }}</td>
                                  <td>{{ $pemilihan_lokasi->mahasiswa->alamat_1 }}</td>
                                    <td>{{ $pemilihan_lokasi->instansiAjuan->nama }}</td>
                                  <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalEdit">Edit</button></td>
                                  <td>{{ $pemilihan_lokasi->mahasiswa->instansi->nama }}</td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Andi</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Jakarta Utara</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalEdit">Edit</button></td>
                                    <td>BPS Jakarta Timur</td>
                                </tr>
                                <th scope="row">2</th>
                                    <td>Budi</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Jakarta Barat</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalEdit">Edit</button></td>
                                    <td>BPS Jakarta Timur</td>
                                </tr>
                                <th scope="row">3</th>
                                    <td>Caca</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Jakarta Selatan</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan</button></td>
                                    <td>Belum Ditentukan</td>
                                <tr>
                                <th scope="row">4</th>
                                    <td>Dono</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Jakarta Timur</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan</button></td>
                                    <td>Belum Ditentukan</td>
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                    <td>Ela</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>Jakarta Timur</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan</button></td>
                                    <td>Belum Ditentukan</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Feny</td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Jakarta Selatan</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan</button></td>
                                    <td>Belum Ditentukan</td>
                                </tr> -->
                            </tbody>
                        </table>
                      </div>
                        <!-- End Table with stripped rows -->

                  <!-- Modal -->
                  <div class="modal fade mt-5" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog mt-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pilih Lokasi Pengajuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                  <div class="modal-body">
                                    <form>
                                      <div class="mb-3">
                                        <label for="provfinal">Provinsi Final</label>
                                          <select class="form-select" aria-label="Default select example" id="provfinal" name="pengalihan">
                                            <option selected>Pilih Provinsi</option>
                                            {{-- <option value="kabupaten1">Provinsi 1</option>
                                            <option value="kabupaten2">Provinsi 2</option>
                                            <option value="kabupaten3">Provinsi 3</option> --}}
                                            @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                            <option value="{{ $pemilihan_lokasi->instansi }}">{{ $pemilihan_lokasi->instansi }}</option>
                                            @endforeach
                                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                        </select>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                        <label for="kabkotfinal">BPS Kabupaten/Kota Final</label>
                                        <select class="form-select" aria-label="Default select example" id="kabkotfinal" name="pengalihan">
                                          <option selected>Pilih BPS Kabupaten/Kota</option>
                                          <option value="kabupaten1">BPS Kabupaten 1</option>
                                          <option value="kabupaten2">BPS Kabupaten 2</option>
                                          <option value="kabupaten3">BPS Kabupaten 3</option>
                                        </select>
                                      </div>
                                  </form>
                                  </div>
                                  <div class="text-end">
                                  <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Batal</button>
                                  <button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk edit -->
                <div class="modal fade mt-5" id="myModalEdit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog mt-5">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Edit Lokasi Pengajuan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="card-body">
                                <div class="modal-body">
                                  <form>
                                    <div class="mb-3">
                                      <label for="provfinal">Provinsi Final</label>
                                        <select class="form-select" aria-label="Default select example" id="provfinal" name="pengalihan">
                                          <option selected>Pilih Provinsi</option>
                                          <option value="kabupaten1">Provinsi 1</option>
                                          <option value="kabupaten2">Provinsi 2</option>
                                          <option value="kabupaten3">Provinsi 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="kabkotfinal">BPS Kabupaten/Kota Final</label>
                                      <select class="form-select" aria-label="Default select example" id="kabkotfinal" name="pengalihan">
                                        <option selected>Pilih BPS Kabupaten/Kota</option>
                                        <option value="kabupaten1">BPS Kabupaten 1</option>
                                        <option value="kabupaten2">BPS Kabupaten 2</option>
                                        <option value="kabupaten3">BPS Kabupaten 3</option>
                                      </select>
                                    </div>
                                </form>
                                </div>
                                <div class="text-end">
                                <button type="button" class="btn btn-danger" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Batal</button>
                                <button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Ubah Lokasi</button>
                                </div>
                              </div>
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