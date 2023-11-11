@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Pemilihan Lokasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="mahasiswa-index">Home</a>
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
            <form class="row g-3">
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-2">Domisili</h5>
              </div>
              <div class="col-md-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Provinsi"
                  >
                    {{-- <option selected>Sumatera Selatan</option>
                    <option value="1">Sulawesi Tenggara</option>
                    <option value="2">Jawa Tengah</option> --}}
                    @foreach($provinsis as $provinsi)
                      <option value="{{ $provinsi->nama }}">{{ $provinsi->nama }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Provinsi</label>
                </div>
              </div>
              <div class="col-md-6 mt-lg-0 mt-md-3">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Kab/Kota"
                  >
                    {{-- <option selected>Pasaman Barat</option>
                    <option value="1">Lok-lok</option>
                    <option value="2">Merauke</option> --}}
                    @foreach($kab_kotas as $kab_kota)
                      <option value="{{ $kab_kota->nama }}">{{ $kab_kota->nama }}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Kab/Kota</label>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingZip"
                    placeholder="Zip"
                  />
                  <label for="floatingZip">Kecamatan</label>
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
              </div>
              <div class="col-md-12 mb-0">
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingName"
                    placeholder="Link Gmaps Alamat"
                  />
                  <label for="floatingName">Alamat Lengkap</label>
                </div>
              </div>
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-0">Prioritas 1</h5>
              </div>
              <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Eselon 1"
                  >
                  @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->nama }}">{{ $provinsi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="floatingSelect">Eselon 1</label>
                </div>
              </div>
              <div class="col-md-6 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Eselon 1"
                  >
                  @foreach($instansis as $instansi)
                    <option value="{{ $instansi->nama }}">{{ $instansi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="floatingSelect">Eselon 2</label>
                </div>
              </div>
              <div class="col-12 mb-0">
                <div class="form-floating">
                  <textarea
                    class="form-control"
                    placeholder="Alasan"
                    id="floatingTextarea"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea">Alasan</label>
                </div>
              </div>
              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-0">Prioritas 2</h5>
              </div>
              <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Eselon 1"
                  >
                  @foreach($provinsis as $provinsi)
                    <option value="{{ $provinsi->nama }}">{{ $provinsi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="floatingSelect">Eselon 1</label>
                </div>
              </div>
              <div class="col-md-6 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="floatingSelect"
                    aria-label="Eselon 1"
                  >
                  @foreach($instansis as $instansi)
                    <option value="{{ $instansi->nama }}">{{ $instansi->nama }}</option>
                  @endforeach
                  </select>
                  <label for="floatingSelect">Eselon 2</label>
                </div>
              </div>
              <div class="col-12 mb-0">
                <div class="form-floating">
                  <textarea
                    class="form-control"
                    placeholder="Alasan"
                    id="floatingTextarea"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea">Alasan</label>
                </div>
              </div>
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