@extends('layouts.main')

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penentuan Dosen Pembimbing Magang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Penentuan Dosen Pembimbing Magang</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-lg-center">Penentuan Dosen Pembimbing Magang oleh Admin</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Lokasi Magang</th>
                                    <th scope="col">Dosen Pembimbing Magang</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0 @endphp
                                {{-- @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                                @php $i = $i + 1 @endphp
                                    <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->nim }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->id_instansi }}</td>
                                    <td>{{ $pemilihan_lokasi->mahasiswa->id_dosen_pembimbing }}</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Tentukan</button></td>

                                @endforeach --}}
                                @foreach ($mahasiswas as $mahasiswa)
                                @php $i = $i + 1 @endphp
                                    <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    @if ($mahasiswa->instansi != NULL)
                                        <td>{{ $mahasiswa->instansi->nama }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($mahasiswa->dosenPembimbing != NULL)
                                        <td>{{ $mahasiswa->dosenPembimbing->nama }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($mahasiswa->dosenPembimbing != NULL)
                                        <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
                                    @else
                                        <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Tentukan</button></td>
                                    @endif

                                @endforeach
                                {{-- <tr>
                                    <th scope="row">1</th>
                                    <td>Andi</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Utara</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Tentukan</button></td>
                                </tr>
                                <th scope="row">2</th>
                                    <td>Baba</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Pusat</td>
                                    <td>Belum Ditentukan</td>
                                    <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Tentukan</button></td>
                                </tr>
                                <th scope="row">3</th>
                                    <td>Dodo</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Tenggara</td>
                                    <td>Arie Wahyu</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
                                </tr>
                                <th scope="row">4</th>
                                    <td>Nana</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Selatan</td>
                                    <td>Arie Wahyu</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                    <td>Kaka</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Timur</td>
                                    <td>Arie Wahyu</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Lala</td>
                                    <td>222222</td>
                                    <td>BPS Jakarta Barat</td>
                                    <td>Arie Wahyu</td>
                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
                                </tr> --}}
                            </tbody>
                        </table>
                      </div>
                        <!-- End Table with stripped rows -->

                  <!-- Modal -->
                  <div class="modal fade mt-5" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog mt-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pilih Dosen Pembimbing</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                  <div class="modal-body">
                                    <div class="table-responsive">
                                    <table class="table datatable text-center">
                                        <thead>
                                            <tr>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nama Dosen</th>
                                            <th scope="col">Jumlah Mahasiswa Bimbingan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Arie Wahyu</td>
                                            <td>4</td>
                                            <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                        </tr>
                                        <th scope="row">2</th>
                                            <td>Rani Nooraeni</td>
                                            <td>0</td>
                                            <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                        </tr>
                                        <th scope="row">3</th>
                                            <td>Lia Hulliyyatus</td>
                                            <td>0</td>
                                            <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                        </tr>
                                        <th scope="row">4</th>
                                            <td>Luthfi Maghfiroh</td>
                                            <td>0</td>
                                            <td><button type="button" class="btn btn-warning" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                        </tr>
                                        </tbody>
                                        </table>
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
                            <h5 class="modal-title">Edit Dosen Pembimbing</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table datatable text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nomor</th>
                                                    <th scope="col">Nama Dosen</th>
                                                    <th scope="col">Jumlah Mahasiswa Bimbingan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Arie Wahyu</td>
                                                    <td>4</td>
                                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Rani Nooraeni</td>
                                                    <td>0</td>
                                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Lia Hulliyyatus</td>
                                                    <td>0</td>
                                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Luthfi Maghfiroh</td>
                                                    <td>0</td>
                                                    <td><button type="button" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#myModalPilih">Pilih</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
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

</section>

  </main><!-- End #main -->
@endsection
