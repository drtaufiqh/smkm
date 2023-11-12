@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="text-end">
        <a href="bps-instansi-buatpembimbing"><button type="button" class="btn btn-success btn">Buat Akun Pembimbing</button></a>
    </div>

    <div class="pagetitle">
      <h1>Daftar Pembimbing Lapangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bps-instansi-dashboard">Home</a></li>
          <li class="breadcrumb-item active">Pembimbing Lapangan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-lg-center">Pembimbing Lapangan BPS Kabupaten/Kota</h5>
                          <!-- Table with stripped rows -->
                          <div class="table-responsive">
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">Nomor</th>
                                      <th scope="col">Nama Pembimbing</th>
                                      <th scope="col">NIP Lama</th>
                                      <th scope="col">NIP Baru</th>
                                      <th scope="col">Akun SMKM</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @php $i = 0 @endphp
                                @foreach ($pembimbing_lapangans as $pembimbing_lapangan)
                                <tr>
                                  <th scope="row">{{ $i += 1 }}</th>
                                    <td>{{ $pembimbing_lapangan->nama }}</td>
                                    <td>{{ $pembimbing_lapangan->nip_lama }}</td>
                                    <td>{{ $pembimbing_lapangan->nip_baru }}</td>
                                    <td>{{ $pembimbing_lapangan->user->username }}</td>
                                    <td>{{ $pembimbing_lapangan->email }}</td>
                                    <td>
                                      <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                      <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                    </td>
                                </tr>
                                @endforeach
                                  {{-- <tr>
                                      <th scope="row">1</th>
                                      <td>Andi</td>
                                      <td>123456789</td>
                                      <td>andi123</td>
                                      <td>andi@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                    
                                  </tr>
                                  <th scope="row">2</th>
                                      <td>Budi</td>
                                      <td>222222222</td>
                                      <td>budi123</td>
                                      <td>budi@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                     
                                  </tr>
                                  <th scope="row">3</th>
                                      <td>Caca</td>
                                      <td>333333333</td>
                                      <td>caca321</td>
                                      <td>caca@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                    
                                  <tr>
                                  <th scope="row">4</th>
                                      <td>Dono</td>
                                      <td>444444444</td>
                                      <td>dono321</td>
                                      <td>dono@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                  </tr>
                                  <tr>
                                  <th scope="row">5</th>
                                      <td>Ela</td>
                                      <td>555555555</td>
                                      <td>ela432</td>
                                      <td>ela@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                      
                                  </tr>
                                  <tr>
                                      <th scope="row">6</th>
                                      <td>Feny</td>
                                      <td>666666666</td>
                                      <td>feny3321</td>
                                      <td>feny@gmail.com</td>
                                      <td>
                                        <button type="button" class="btn btn-primary" style="color: white;">Kirim Akun</button>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus Akun</button>
                                      </td>
                                      
                                  </tr> --}}
                              </tbody>
                          </table>
                        </div>
                          <!-- End Table with stripped rows -->
          </div>
      </div>
  </div>

  </section>


  </main><!-- End #main -->
@endsection