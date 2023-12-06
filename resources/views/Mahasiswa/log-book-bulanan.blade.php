@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Log Book Bulanan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
            <li class="breadcrumb-item active">Log Book Bulanan</li>
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
                    <form action="/mahasiswa/add-monthly-lb/{{ Auth::user()->info()->id }}" method="POST" class="form-log-book accordion-body row g-3 pt-3">
                      @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingKegiatan"
                            placeholder="Contoh: Input kuesioner SUSENAS"
                            name="uraian_kegiatan"
                          />
                          <label for="floatingKegiatan">Kegiatan</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingSatuan"
                            placeholder="Contoh: Lembar"
                            name="satuan"
                          />
                          <label for="floatingSatuan">Satuan</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingTarget"
                            placeholder="Contoh: 100"
                            name="kuantitas_target"
                          />
                          <label for="floatingTarget">Target</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingRealisasi"
                            placeholder="Contoh: 100"
                            name="kuantitas_realisasi"
                          />
                          <label for="floatingName">Realisasi</label>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-floating">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingKeterangan"
                            placeholder="Contoh: Kuesioner robek 1"
                            name="keterangan"
                          />
                          <label for="floatingKeterangan">Keterangan</label>
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
                <div class="table-responsive">
                  <table class="table datatable table-hover">
                    <h5 class="card-title">Log Book</h5>
                    <thead class="table-primary">
                      <tr>
                        <th scope="col" rowspan="2" class="align-middle">No</th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Kegiatan
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Satuan
                        </th>
                        <th scope="col" colspan="3" class="text-center">
                          Kuantitas
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Kualitas
                        </th>
                        <th scope="col" rowspan="2" class="align-middle">
                          Keterangan
                        </th>
                      </tr>
                      <tr>
                        <th scope="col">Target</th>
                        <th scope="col">Realisasi</th>
                        <th scope="col">%</th>
                      </tr>
                    </thead>

                    <tbody>
                      @php $i = 0 @endphp
                      @foreach ($jurnaling_bulanans as $jurnaling_bulanan)
                      @php $i = $i + 1 @endphp
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $jurnaling_bulanan->uraian_kegiatan }}</td>
                        <td>{{ $jurnaling_bulanan->satuan }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_target }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_realisasi }}</td>
                        <td>{{ $jurnaling_bulanan->kuantitas_realisasi/$jurnaling_bulanan->kuantitas_target*100  }}%</td>
                        <td>
                          <div class="progress">
                            <div
                              class="progress-bar"
                              role="progressbar"
                              style="width: {{ $jurnaling_bulanan->tingkat_kualitas }}%"
                              aria-valuenow="{{ $jurnaling_bulanan->tingkat_kualitas }}%"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            >
                            {{ $jurnaling_bulanan->tingkat_kualitas }}
                            </div>
                          </div>
                        </td>
                        <td class="text-center">-</td>
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