@extends('layouts.main')

@section('container')
    @include('partials.sidebar-admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil {{ Auth::user()->info()->nama }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Ubah Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card h-100">
            <div class="card-body d-flex justify-content-center align-items-center ">

              <img src="/assets/img/pw.png" alt="Profile" class=" w-100">
            </div>
          </div>

        </div>
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Keamanan</button>
                </li>
{{-- 
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-lokasi">Lokasi Peta</button>
                </li> --}}

              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  {{-- <h5 class="card-title">Akun</h5> --}}
                    @include('komponen.pesan')

                    <form method="POST" action="{{ route('ubah_password_admin', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                    <div class="row mt-2 mb-3 disabled">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input  name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_lama" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_lama" type="password" class="form-control" id="password_lama">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_baru" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_baru" type="password" class="form-control" id="password_baru">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="ulangi_password_baru" class="col-md-4 col-lg-3 col-form-label">Ulangi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ulangi_password_baru" type="password" class="form-control" id="ulangi_password_baru">
                      </div>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </section>

  </main><!-- End #main -->
@endsection