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
              <div class="col-md-6">
                <div class="col-12 mt-0">
                  <h5 class="card-title mb-0 mt-2">Alamat Domisili Utama</h5>
                </div>
                <div class="col-md-12 mt-0">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="provinsi-alamat-1"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="provinsi_alamat_1"
                      value="{{ Auth::user()->info()->kabKotaAlamat1->provinsi->nama ?? '-' }}"
                      readonly
                    />
                    <label for="provinsi-alamat-1">Provinsi</label>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="kabkota-alamat-1"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="kabkota_alamat_1"
                      value="{{ Auth::user()->info()->kabKotaAlamat1->nama ?? '-' }}"
                      readonly
                    />
                    <label for="kabkota-alamat-1">Kab/Kota</label>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="alamat-1"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="alamat_1"
                      value="{{ Auth::user()->info()->alamat_1 ?? "-" }}"
                      readonly
                    />
                    <label for="alamat-1">Alamat Lengkap</label>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="col-12 mt-0">
                  <h5 class="card-title mb-0 mt-2">Alamat Lain (Opsional)</h5>
                </div>
                <div class="col-md-12 mt-0">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="provinsi-alamat-2"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="provinsi_alamat_2"
                      value="{{ Auth::user()->info()->kabKotaAlamat2->provinsi->nama ?? '-' }}"
                      readonly
                    />
                    <label for="provinsi-alamat-2">Provinsi</label>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="kabkota-alamat-2"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="kabkota_alamat_2"
                      value="{{ Auth::user()->info()->kabKotaAlamat2->nama ?? '-' }}"
                      readonly
                    />
                    <label for="kabkota-alamat-2">Kab/Kota</label>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="alamat-2"
                      placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                      name="alamat_2"
                      value="{{ Auth::user()->info()->alamat_2 ?? "-" }}"
                      readonly
                    />
                    <label for="alamat-2">Alamat Lengkap</label>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <a href="/mahasiswa/profil" class="btn btn-secondary">Edit Alamat</a>
              </div>

              <div class="col-12 mt-0">
                <h5 class="card-title mb-0 mt-0">Pilihan 1</h5>
              </div>
              <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="provinsi-pilihan-1"
                    aria-label="Pilihan 1"
                  >
                  <option value="">Provinsi Lokasi Magang Prioritas 1</option>
                  </select>
                  <label for="provinsi-pilihan-1">Provinsi</label>
                </div>
              </div>
              <div class="col-md-6 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="instansi-pilihan-1"
                    aria-label="Instansi Pilihan 1"
                    name = "id_pilihan_1"
                  >
                    <option value="">Pilihan Provinsi Dahulu</option>
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
              <div class="col-lg-6 mt-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="provinsi-pilihan-2"
                    aria-label="Pilihan 2"
                  >
                  <option value="">Provinsi Lokasi Magang Prioritas 2</option>
                  </select>
                  <label for="provinsi-pilihan-2">Provinsi</label>
                </div>
              </div>
              <div class="col-md-6 mt-lg-0 mt-md-0">
                <div class="form-floating">
                  <select
                    class="form-select"
                    id="instansi-pilihan-2"
                    aria-label="Instansi Pilihan 2"
                    name = "id_pilihan_2"
                  >
                    <option value="">Pilihan Provinsi Dahulu</option>
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

@section('js-bang')
<script>
    $(document).ready(function () {
        // Mengisi dropdown provinsi saat halaman dimuat
        $.ajax({
            url: '/get-provinsi',
            type: 'GET',
            success: function (response) {
                $.each(response, function (id, nama) {
                    $('#provinsi-pilihan-1').append(new Option(nama, id));
                });
            },
            error: function (error) {
                console.error('Error fetching provinces:', error);
            }
        });

        // Menangani perubahan pada dropdown provinsi
        $('#provinsi-pilihan-1').change(function () {
            var idProvinsi = $(this).val();

            // Mengosongkan dropdown instansi
            $('#instansi-pilihan-1').empty().append(new Option('Pilih Lokasi Magang Prioritas 1', ''));

            // Mengisi dropdown instansi berdasarkan provinsi yang dipilih
            if (idProvinsi) {
                $.ajax({
                    url: '/get-instansi/' + idProvinsi,
                    type: 'GET',
                    success: function (response) {
                        $.each(response, function (id, nama) {
                            $('#instansi-pilihan-1').append(new Option(nama, id));
                        });
                    },
                    error: function (error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            }
        });

        // Mengisi dropdown provinsi saat halaman dimuat
        $.ajax({
            url: '/get-provinsi',
            type: 'GET',
            success: function (response) {
                $.each(response, function (id, nama) {
                    $('#provinsi-pilihan-2').append(new Option(nama, id));
                });
            },
            error: function (error) {
                console.error('Error fetching provinces:', error);
            }
        });

        // Menangani perubahan pada dropdown provinsi
        $('#provinsi-pilihan-2').change(function () {
            var idProvinsi = $(this).val();

            // Mengosongkan dropdown instansi
            $('#instansi-pilihan-2').empty().append(new Option('Pilih Lokasi Magang Prioritas 2', ''));

            // Mengisi dropdown instansi berdasarkan provinsi yang dipilih
            if (idProvinsi) {
                $.ajax({
                    url: '/get-instansi/' + idProvinsi,
                    type: 'GET',
                    success: function (response) {
                        $.each(response, function (id, nama) {
                            $('#instansi-pilihan-2').append(new Option(nama, id));
                        });
                    },
                    error: function (error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            }
        });
    });
</script>
@endsection