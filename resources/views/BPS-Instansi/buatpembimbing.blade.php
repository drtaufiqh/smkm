@extends('layouts.main')

@section('container')
    @include('partials.sidebar-instansi')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Buat Akun Pembimbing Lapangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/bps-instansi/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/bps-instansi/pembimbinglap">Pembimbing Lapangan</a></li>
          <li class="breadcrumb-item active">Buat Akun</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


  <body>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-xl-center">Form Buat Akun Pembimbing Lapangan</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" action="/bps-instansi/pembimbinglap" method="POST">
            @csrf
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
                <label for="floatingName">Nama Pembimbing Lapangan</label>
              </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingNIP" placeholder="NIP">
                  <label for="floatingName">NIP</label>
                </div>
              </div>
            <div class="col-md-12">
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
                  <label for="floatingName">Email Pembimbing</label>
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingAccount" placeholder="Your Account">
                <label for="floatingEmail">Nama Akun Pembimbing</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Buat Akun</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>
</body>



  </main><!-- End #main -->
@endsection