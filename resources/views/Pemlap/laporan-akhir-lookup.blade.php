@extends('layouts.main')

@section('container')
    @include('partials.sidebar-pemlap')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Laporan Akhir</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Laporan Akhir</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-5">
            <div class="card">
              <!-- <h6 class="card-title">Upload</h6> -->
              <div class="filename card-header bg-primary-subtle text-center">
                222111888_Sukamto_Laporan Akhir.pdf
              </div>
              <div style="margin: 10px;" class="text-center">
                <button type="button" class="bi bi-download btn btn-primary btn-sm">
                  Download
                </button>
                <button type="button" class="bi bi-eye btn btn-primary btn-sm">
                  Lihat
                </button>
              </div>
              <div class="card-body">
                <!-- Accordion without outline borders -->
                <div
                  class="accordion accordion-flush"
                  id="accordionFlushExample"
                >
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne"
                        aria-expanded="false"
                        aria-controls="flush-collapseOne"
                      >
                        Beri Komentar
                      </button>
                    </h2>
                    <div
                      id="flush-collapseOne"
                      class="accordion-collapse collapse"
                      aria-labelledby="flush-headingOne"
                      data-bs-parent="#accordionFlushExample"
                    >
                      <div class="accordion-body">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Tuliskan Komentar.</textarea>
                      </div>

                      <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo"
                        aria-expanded="false"
                        aria-controls="flush-collapseTwo"
                      >
                        Approval
                      </button>
                    </h2>
                    <div
                      id="flush-collapseTwo"
                      class="accordion-collapse collapse"
                      aria-labelledby="flush-headingTwo"
                      data-bs-parent="#accordionFlushExample"
                    >
                      <div class="accordion-body">
                        <button type="button" class="bi bi-file-earmark-check btn btn-success btn-sm">
                          Approve
                        </button>
                        <button type="button" class="bi bi-file-earmark-excel btn btn-danger btn-sm">
                          Revisi
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion without outline borders -->

                <!-- Vertical Form -->

                <!-- Vertical Form -->
              </div>
            </div>
          </div>
          <!-- preview -->
          <div class="col-lg-7">
            <div class="card h-auto">
              <div class="card-body m-0 p-0">
                <div class="d-flex border border-dark" style="height: 600px">
                  <iframe
                    src="./assets/doc/Persetujuan Orang Tua.pdf"
                    style="
                      width: 100%;
                      height: 100%;
                      border: none;
                      scrollbar-width: thin;
                      scrollbar-color: #aab7cf transparent;
                    "
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- End Preview -->
        </div>
      </section>
    </main>
    <!-- End #main -->
@endsection