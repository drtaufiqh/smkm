@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Log Book Harian</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
            <li class="breadcrumb-item active">Log Book Harian</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
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
                      Tambah Log Book
                    </button>
                  </h2>
                  <div
                    id="collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample"
                  >
                    @include('komponen.pesan')
                    <form action="/mahasiswa/add-daily-lb/{{ Auth::user()->info()->id }}" method="POST" class="form-log-book accordion-body row g-3 pt-3">
                      @csrf
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingName"
                            placeholder="Contoh: Membuat infografis SUTAS"
                            name="pekerjaan"
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
                            placeholder="Contoh: 1"
                            name="volume"
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
                            placeholder="Contoh: Lembar"
                            name="satuan"
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
                            placeholder="Contoh: 3 Jam"
                            name="durasi"
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
                            placeholder="Contoh: Bu Siti"
                            name="pemberi_tugas"
                          />
                          <label for="floatingName">Pemberi Tugas</label>
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-success m-2">
                          Tambah
                        </button>
                        <button type="reset" class="btn btn-danger">
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

            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <h5 class="card-title">Log Book</h5>
                <div class="table-responsive">
                  <table class="table datatable table-hover">
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
                              style="width: {{ $jurnaling_harian->status_penyelesaian }}%"
                              aria-valuenow="90"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            >
                              @if ($jurnaling_harian->status_penyelesaian != 0 )
                              {{ $jurnaling_harian->status_penyelesaian }}%
                              @else
                              {{ $jurnaling_harian->status_penyelesaian }}
                              @endif

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
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection