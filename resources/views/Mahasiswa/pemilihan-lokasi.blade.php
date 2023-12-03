@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Pemilihan Lokasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
            <li class="breadcrumb-item active">Lokasi</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="card col-lg-7 col-md-12 col-sm-12 mx-auto">
          <div class="card-body">
            <!-- Floating Labels Form -->
            <form class="row g-3" action="/mahasiswa/submitted-pemilihan-lokasi/{{ Auth::user()->info()->id }}" method="POST">
              @csrf
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-2">Domisili</h5>
              </div>
              <div class="col-md-12 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="provinsi-domisili"
                    aria-label="Provinsi"
                  >
                    <!-- {{-- <option selected>Sumatera Selatan</option>
                    <option value="1">Sulawesi Tenggara</option>
                    <option value="2">Jawa Tengah</option> --}} -->
                    @foreach($provinsis as $provinsi)
                      <option 
                        value="{{ $provinsi->nama }}"
                        {{ (optional(Auth::user()->info()->kabKotaAlamat1)->id_prov == $provinsi->id) ? 'selected' : '' }}
                      >
                        {{ $provinsi->nama }}
                      </option>
                    @endforeach
                  </select>
                  <label for="provinsi-domisili">Provinsi</label>
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="kabkota-domisili"
                    aria-label="Kab/Kota"
                  >
                    <!-- {{-- <option selected>Pasaman Barat</option>
                    <option value="1">Lok-lok</option>
                    <option value="2">Merauke</option> --}} -->
                    @foreach($kab_kotas as $kab_kota)
                      <option 
                        value="{{ $kab_kota->id }}"
                        {{ (optional(Auth::user()->info()->kabKotaAlamat1)->id == $kab_kota->id) ? 'selected' : '' }}
                      >
                        {{ $kab_kota->nama }}
                      </option>
                    @endforeach
                  </select>
                  <label for="kabkota-domisili">Kab/Kota</label>
                </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="kecamatan-domisili"
                    placeholder="Kecamatan"
                  />
                  <label for="kecamatan-domisili">Kecamatan</label>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingZip"
                    placeholder="Zip"
                  />
                  <label for="floatingZip">Kode Pos</label>
                </div>
              </div> --}}
              <div class="col-md-12 mb-0">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="alamat-domisili"
                    placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                  />
                  <label for="alamat-domisili">Alamat Lengkap</label>
                </div>
              </div>
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-0">Pilihan 1</h5>
              </div>
              {{-- <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="provinsi-pilihan-1"
                    aria-label="Eselon 1"
                  >
                  @foreach($provinsis as $provinsi)
                    <option 
                      value="{{ $provinsi->id }}" 
                    >
                      {{ $provinsi->nama }}
                    </option>
                  @endforeach
                  </select>
                  <label for="provinsi-pilihan-1">Provinsi</label>
                </div>
              </div> --}}
              <div class="col-md-12 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="instansi-pilihan-1"
                    aria-label="Instansi Pilihan 1"
                    name = "id_pilihan_1"
                  >
                    <option value="">Pilihan Lokasi Magang Prioritas 1</option>
                  @foreach($instansis as $instansi)
                    @if (($instansi->is_prov == 1))
                        <option value="">{{ '===== PROVINSI ' . Str::upper($instansi->kabKota->provinsi->nama) . ' =====' }}</option>
                    @endif
                    <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="instansi-pilihan-1">Instansi</label>
                </div>
              </div>
              {{-- <div class="col-12 mb-0">
                <div class="form-floating">
                  <textarea
                    class="form-control"
                    id="alasan-pilihan-1"
                    style="height: 100px"
                    name = "alasan_pilihan_1"
                  ></textarea>
                  <label for="alasan-pilihan-1">Alasan</label>
                </div>
              </div> --}}
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-0">Pilihan 2</h5>
              </div>
              {{-- <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="provinsi-pilihan-2"
                    aria-label="Eselon 1"
                  >
                  @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->nama }}">{{ $provinsi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="provinsi-pilihan-2">Provinsi</label>
                </div>
              </div> --}}
              <div class="col-md-12 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="instansi-pilihan-2"
                    aria-label="Eselon 1"
                    name = "id_pilihan_2"
                  >
                    <option value="">Pilihan Lokasi Magang Prioritas 2</option>
                  @foreach($instansis as $instansi)
                    @if (($instansi->is_prov == 1))
                        <option value="">{{ '===== PROVINSI ' . Str::upper($instansi->kabKota->provinsi->nama) . ' =====' }}</option>
                    @endif
                    <option value="{{ $instansi->id }}">{{ $instansi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="instansi-pilihan-2">Instansi</label>
                </div>
              </div>
              {{-- <div class="col-12 mb-0">
                <div class="form-floating">
                  <textarea
                    class="form-control"
                    id="alasan-pilihan-2"
                    style="height: 100px"
                    name="alasan_pilihan_2"
                  ></textarea>
                  <label for="alasan-pilihan-2">Alasan</label>
                </div>
              </div> --}}

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>

            <!-- End floating Labels Form -->
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection