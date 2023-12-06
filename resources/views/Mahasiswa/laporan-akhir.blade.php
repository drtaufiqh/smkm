@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Laporan Akhir</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/mahasiswa/index">Home</a>
            </li>
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
              <div class="filename card-header bg-primary-subtle text">
                222111888_Sukamto_Laporan Akhir.pdf
                <!-- <button type="button" class="btn btn-primary btn-sm">
                  Download
                </button> -->
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
                        Komentar Pembimbing Lapangan
                      </button>
                    </h2>
                    <div
                      id="flush-collapseOne"
                      class="accordion-collapse collapse"
                      aria-labelledby="flush-headingOne"
                      data-bs-parent="#accordionFlushExample"
                    >
                      <div class="accordion-body">
                        Placeholder content for this accordion, which is
                        intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the first
                        item's accordion body.
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
                        Komentar Dosen Pembimbing
                      </button>
                    </h2>
                    <div
                      id="flush-collapseTwo"
                      class="accordion-collapse collapse"
                      aria-labelledby="flush-headingTwo"
                      data-bs-parent="#accordionFlushExample"
                    >
                      <div class="accordion-body">
                        Placeholder content for this accordion, which is
                        intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the second
                        item's accordion body. Let's imagine this being filled
                        with some actual content.
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion without outline borders -->

                <!-- Vertical Form -->

                <!-- Vertical Form -->
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <form class="row g-3">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label"></label>
                    <input type="file" class="form-control" id="inputNanme4" />
                  </div>
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-sm col-12">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- preview -->
          <div class="col-lg-7">
            <div class="card h-auto">
              <div class="card-body m-0 p-0">
                <div class="d-flex border border-dark" style="height: 600px">
                  <iframe
                    src="/assets/doc/Laporan Magang.pdf"
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