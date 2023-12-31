@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              <!-- Customers Card -->
              <div class="col-sm-12 col-xl-7">
                <div class="card info-card customers-card">
                  <div class="filter">
                    <a
                      style="
                        color: #aab7cf;
                        padding-right: 20px;
                        padding-bottom: 5px;
                        transition: 0.3s;
                        font-size: 1rem;
                      "
                      >{{ now()->format('d M Y') }}</a
                    >
                  </div>

                  <div class="card-body pb-1">
                    <h5 class="card-title">Selamat datang!</h5>

                    <div class="d-flex align-items-center">
                      <div
                        class="card-icon profile rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-person"></i>
                      </div>
                      <div class="ps-3">
                        <p class="mb-0">{{ Auth::user()->info()->nama }}</p>
                        <span class="text-muted small">{{ Auth::user()->info()->nim }}</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                      <div
                        class="card-icon office rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-building"></i>
                      </div>
                      <div class="ps-3">
                        <p class="mb-0">Lokasi Magang</p>
                          <span class="text-muted small">{{ ($finalisasi) ? (optional(Auth::user()->info()->instansi)->nama) ?? '-' : '-' }}</span>
                        <!-- <button class="btn btn-primary btn-sm">Tentukan</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Customers Card -->

              <div class="col-sm-12 col-xl-5">
                <div class="card info-card customers-card">
                  <div class="card-body pb-1">
                    <h5 class="card-title">Pembimbing</h5>

                    <div class="d-flex align-items-center">
                      <div
                        class="card-icon pembimbing rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-person-video3"></i>
                      </div>
                      <div class="ps-3">
                        <p class="mb-0">Dosen pembimbing</p>
                        <span class="text-muted small">{{ (Auth::user()->info()->dosenpembimbing) ? Auth::user()->info()->dosenpembimbing->nama : '-' }}</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                      <div
                        class="card-icon pembimbing rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <p class="mb-0">Pembimbing lapangan</p>
                        <span class="text-muted small">{{ (Auth::user()->info()->pembimbinglapangan) ? Auth::user()->info()->pembimbinglapangan->nama : '-' }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@if ($sudah_magang)
            <div class="col-12">
              <div class="col-lg-12">
                <!-- Form Tambah Log Book -->
                <div class="card col-12 mx-auto fade show">
                  <!-- Default Accordion -->
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          class="accordion-button"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseOne"
                          aria-expanded="true"
                          aria-controls="collapseOne"
                        >
                          <b>Tambah Log Book Harian</b>
                        </button>
                      </h2>
                      <div
                        id="collapseOne"
                        class="accordion-collapse collapse show"
                        aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample"
                      >
                        <form class="form-log-book accordion-body row g-3">
                          <div class="col-md-6">
                            <div class="form-floating">
                              <input
                                type="text"
                                class="form-control"
                                id="floatingName"
                                placeholder="Pekerjaan"
                              />
                              <label for="floatingName">Pekerjaan</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-floating">
                              <input
                                type="text"
                                class="form-control"
                                id="floatingName"
                                placeholder="Volume"
                              />
                              <label for="floatingName">Volume</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-floating">
                              <input
                                type="text"
                                class="form-control"
                                id="floatingName"
                                placeholder="Satuan"
                              />
                              <label for="floatingName">Satuan</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-floating">
                              <input
                                type="text"
                                class="form-control"
                                id="floatingName"
                                placeholder="Durasi"
                              />
                              <label for="floatingName">Durasi</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-floating">
                              <input
                                type="text"
                                class="form-control"
                                id="floatingName"
                                placeholder="Pemberi Tugas"
                              />
                              <label for="floatingName">Pemberi Tugas</label>
                            </div>
                          </div>
                          <div class="text-end">
                            <button type="submit" class="btn btn-primary m-2">
                              Tambah
                            </button>
                            <button type="reset" class="btn btn-secondary">
                              Reset
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Default Accordion Example -->
                </div>
                <!-- End Form Tambah Log Book -->
              </div>
              <div class="card">
                <div class="card-body">
                  <!-- Table with stripped rows -->
                  <h5 class="card-title">Log Book Harian</h5>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Pekerjaan</th>
                          <th scope="col">Volume</th>
                          <th scope="col">Satuan</th>
                          <th scope="col">Durasi</th>
                          <th scope="col">Pemberi Tugas</th>
                          <th scope="col">Penyelesaian</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 0 @endphp
                        @foreach ($jurnaling_harians as $jurnaling_harian)
                        @php $i = $i + 1 @endphp
                        <tr>
                          <th scope="row">{{ $i }}</th>
                          <td>{{ $jurnaling_harian->tanggal }}</td>
                          <td>{{ $jurnaling_harian->deskripsi_pekerjaan }}</td>
                          <td>{{ $jurnaling_harian->kuantitas_volume }}</td>
                          <td>{{ $jurnaling_harian->kuantitas_satuan }}</td>
                          <td>{{ $jurnaling_harian->durasi_waktu }}</td>
                          <td>{{ $jurnaling_harian->pemberi_tugas }}</td>
                          <td>
                            <div class="progress">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 90%"
                                aria-valuenow="90"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              >
                                {{ $jurnaling_harian->status_penyelesaian }}
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
            <!-- Reports -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    Produktivitas <span> | minggu ini</span>
                  </h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [
                          {
                            name: "Kegiatan",
                            data: [31, 40, 28, 51, 42, 82, 56],
                          },
                          // {
                          //   name: "Revenue",
                          //   data: [11, 32, 45, 32, 34, 52, 41],
                          // },
                          // {
                          //   name: "Customers",
                          //   data: [15, 11, 32, 18, 9, 24, 11],
                          // },
                        ],
                        chart: {
                          height: 350,
                          type: "area",
                          toolbar: {
                            show: false,
                          },
                        },
                        markers: {
                          size: 4,
                        },
                        colors: ["#2eca6a"],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100],
                          },
                        },
                        dataLabels: {
                          enabled: false,
                        },
                        stroke: {
                          curve: "smooth",
                          width: 2,
                        },
                        xaxis: {
                          type: "date",
                          categories: [
                            "19 Jan",
                            "20 Jan",
                            "21 Jan",
                            "22 Jan",
                            "23 Jan",
                            "24 Jan",
                            "25 Jan",
                          ],
                        },
                        tooltip: {
                          x: {
                            format: "dd/MM/yy",
                          },
                        },
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->
                </div>
              </div>
            </div>
            <!-- End Reports -->
@endif

@if (Auth::user()->alamat_1 == null)
    
      <!-- End Page Title -->
      <section class="section">
        <div class="card col-lg-12 col-md-12 col-sm-12 mx-auto">
          <div class="card-body">
              <div class="col-md-12">
                <div class="col-12 mt-0">
                  <h5 class="card-title mb-0 mt-0">Alamat Domisili Utama</h5>
                </div>
                <div class="row">
                  
                  <div class="col-md-4 my-3">
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control"
                        id="provinsi-alamat-1"
                        placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                        name="provinsi_alamat_1"
                        value="{{ Auth::user()->info()->kabKotaAlamat1->provinsi->nama ?? '-' }}"
                        readonly
                        required
                        disabled
                      />
                      <label for="provinsi-alamat-1">Provinsi</label>
                    </div>
                  </div>

                  <div class="col-md-4 my-3">
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control"
                        id="kabkota-alamat-1"
                        placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                        name="kabkota_alamat_1"
                        value="{{ Auth::user()->info()->kabKotaAlamat1->nama ?? '-' }}"
                        readonly
                        required
                        disabled
                      />
                      <label for="kabkota-alamat-1">Kab/Kota</label>
                    </div>
                  </div>

                  <div class="col-md-4 my-3">
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control"
                        id="alamat-1"
                        placeholder="Contoh: Jalan Contoh No 1, Kelurahan Makalah, Kecamatan Paper"
                        name="alamat_1"
                        value="{{ Auth::user()->info()->alamat_1 ?? "-" }}"
                        readonly
                        required
                        disabled
                      />
                      <label for="alamat-1">Alamat Lengkap</label>
                    </div>
                  </div>

                </div>
              </div>
              
              <div class="text-center d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/mahasiswa/profil" class="btn btn-primary">Edit Profil</a>
              </div>

          </div>
        </div>
@endif
          </div>
          <!-- End Left side columns -->
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection