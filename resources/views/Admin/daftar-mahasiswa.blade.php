@extends('layouts.main')

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Daftar Mahasiswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-lg-center">Daftar Mahasiswa</h5>
                        @include('komponen.pesan')

                <!-- TOMBOL TAMBAH EXPORT IMPORT DATA -->
                <div class="pb-3">
                  {{-- <a href='{{ url('/admin/mahasiswas/create') }}' class="btn btn-primary">+ Tambah Data</a> --}}
                  <a href='{{ url('/admin/export-template-akun-mahasiswa') }}' class="btn btn-primary">Unduh Template</a>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                    + Import
                  </button>
                  <form onsubmit="return confirm('Yakin akan menghapus semua data mahasiswa?')" class="d-inline" action="{{ url('/admin/mahasiswa/delete-all') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus Semua</button>
                  </form>
                  <a href='{{ url('/admin/export-akun-mahasiswa') }}' class="btn btn-primary">Export</a>
                </div>

                <!-- Modal Import -->
                <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="importModalLabel">Import Daftar Akun Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/admin/import-akun-mahasiswa" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          {{ csrf_field() }}
                          <a href='{{ url('/admin/export-template-akun-mahasiswa') }}' class="btn btn-primary p-2 my-2">Unduh Template</a>
                          <div class="from-group">
                            <input type="file" name="file_import" required accept=".xlsx, .csv">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Import</button>
                        </div>
                      </form>
                  </div>
                  </div>
                </div>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Lokasi Magang</th>
                                    <th scope="col">Pembimbing Lapangan</th>
                                    <th scope="col">Dosen Pembimbing</th>
                                    {{-- <th scope="col">Jadwal Bimbingan Magang</th>
                                    <th scope="col">Log Book</th> --}}
                                    {{-- <th scope="col">Laporan Akhir Magang</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i = 0 @endphp
                                @foreach ($mahasiswas as $mahasiswa)
                                @php $i = $i + 1 @endphp
                                  <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->user->email }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->kelas }}</td>
                                    <td>{{ optional($mahasiswa->instansi)->nama ?? '-' }}</td>
                                    <td>{{ optional($mahasiswa->pembimbingLapangan)->nama ?? '-' }}</td>
                                    <td>{{ optional($mahasiswa->dosenPembimbing)->nama ?? '-' }}</td>
                                    {{-- <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td> --}}
                                    {{-- <!-- <td>{{ $mahasiswa->laporanAkhir->laporan_final }} </td> --> --}}
                                    {{-- <td>
                                      @if ($mahasiswa->laporanAkhir && $mahasiswa->laporanAkhir->laporan_final)
                                          Sudah Dikumpulkan
                                      @else
                                          Belum Dikumpulkan
                                      @endif
                                    </td> --}}
                                    <td>
                                        <a href='{{ url('/admin/mahasiswa/detail/'.$mahasiswa->id) }}' class="btn btn-primary btn-sm m-2">Detail</a>
                                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('/admin/mahasiswa/'.$mahasiswa->id) }}" method="post">
                                          @csrf
                                          @method("DELETE")
                                          <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Andi</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Belum Dikumpulkan</td>
                                </tr>
                                <th scope="row">2</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Budi</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Belum Dikumpulkan</td>
                                    </tr>
                                <th scope="row">3</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Caca</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Sudah Dikumpulkan</td>
                                    </tr>
                                <th scope="row">4</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Dono</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Belum Dikumpulkan</td>
                                    </tr>
                                <tr>
                                <th scope="row">5</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Ela</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Sudah Dikumpulkan</td>
                                    </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td><a href="/admin/dashboard" class="text-dark">Feny</a></td>
                                    <td>3SD2</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>Amin</td>
                                    <td>Budi</td>
                                    <td><a href="#"><button type="button" class="btn btn-success my-4" style="color: white;" data-bs-toggle="modal">Lihat</button></a></td>
                                    <td><a href="#"><button type="button" class="btn btn-success w-100 my-2" style="color: white;" data-bs-toggle="modal">Harian</button></a>
                                        <a href="#"><button type="button" class="btn btn-success w-100" style="color: white;" data-bs-toggle="modal">Bulanan</button></a></td>
                                    <td>Sudah Dikumpulkan</td>
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
{{-- <div class="text-center">
  <button type="button" class="btn btn-primary btn-lg">Finalisasi</button>
</div> --}}
</section>

  </main><!-- End #main -->
@endsection