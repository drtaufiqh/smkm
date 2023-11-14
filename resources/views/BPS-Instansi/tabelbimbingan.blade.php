@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Bimbingan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item active"><a href="/bps-instansi/daftarbimbingan">Daftar Bimbingan</a></li>
          <li class="breadcrumb-item active">Tabel Bimbingan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


  <body>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-lg-center">Tabel Bimbingan BPS Kabupaten/Kota</h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Pembimbing</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0 @endphp
                                @foreach ($pembimbing_lapangans as $pembimbing_lapangan)
                                    @php
                                        $mhs = \App\Models\Mahasiswa::where('id_pembimbing_lapangan', $pembimbing_lapangan->id)->get();
                                        $mhsCount = $mhs->count();
                                        if ($mhsCount === 0) {
                                            $mhsCount = 1;
                                        }
                                    @endphp
                                    @foreach ($mhs as $index => $mahasiswa)
                                        <tr>
                                            @if ($index === 0)
                                                <th scope="row" rowspan="{{ $mhsCount }}" style="vertical-align: middle; text-align: center;">{{ ++$i }}</th>
                                                <td rowspan="{{ $mhsCount }}" style="vertical-align: middle; text-align: center;">{{ $pembimbing_lapangan->nama }}</td>
                                            @endif

                                            <td>{{ $mahasiswa->nama}}</td>
                                            <td>{{ $mahasiswa->nim}}</td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <a href="bps-instansi-editdaftarbimbingan">
                                                    <button type="button" class="btn btn-primary" style="color: white;">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                {{-- <tr>
                                    <td>Anita</td>
                                    <td>434151515</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                            <th scope="row" rowspan="5" style="vertical-align: middle; text-align: center;">2</th>
                                            <td rowspan="5" style="vertical-align: middle; text-align: center;">Levy</td>
                                            <td>John</td>
                                            <td>1111111111</td>
                                            <td rowspan="5" style="vertical-align: middle; text-align: center;">
                                                <a href="/bps-instansi/editdaftarbimbingan">
                                                    <button type="button" class="btn btn-primary" style="color: white;">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Susan</td> 
                                            <td>2222222222</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>David</td>
                                            <td>333333333</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Linda</td>
                                            <td>5555555555</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Robert</td>
                                            <td>434151515</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" style="color: white;">Hapus</button>
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