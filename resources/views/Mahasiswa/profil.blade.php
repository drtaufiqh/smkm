@extends('layouts.main')

@section('container')
    @include('partials.sidebar-mhs')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/mahasiswa/index">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{ (Auth::user()->info()->foto) ?? "/storage/assets/img//1701535520_BPS.jpg" }}" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->info()->nama }}</h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                @include('komponen.pesan')

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->nama }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIM</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->nim }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelas</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->kelas }}</div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->jenis_kelamin ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->email ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Handphone</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->no_hp ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat Domisili</div>
                    <div class="col-lg-4 col-md-4">{{ Auth::user()->info()->alamat_1 ?? "-" }}</div>
                    <div class="col-lg-3 col-md-4 label">{{ Auth::user()->info()->kabKotaAlamat1->nama ?? "Kabupaten/Kota: -" }}</div>
                    <div class="col-lg-2 col-md-4 label">{{ Auth::user()->info()->kabKotaAlamat1->provinsi->nama ?? "Provinsi: -" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat Lain di Luar Domisili (Opsional)</div>
                    <div class="col-lg-4 col-md-4">{{ Auth::user()->info()->alamat_2 ?? "-" }}</div>
                    <div class="col-lg-3 col-md-4 label">{{ Auth::user()->info()->kabKotaAlamat2->nama ?? "Kabupaten/Kota: -" }}</div>
                    <div class="col-lg-2 col-md-4 label">{{ Auth::user()->info()->kabKotaAlamat2->provinsi->nama ?? "Provinsi: -" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bank</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->bank ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Atas Nama Bank</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->an_bank ?? "-" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Rekening</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->info()->no_rek ?? "-" }}</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('editProfil', ['id' => Auth::user()->info()->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="foto" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img id="fotoPreview" src="{{ (Auth::user()->info()->foto) ?? "/storage/assets/img//1701535520_BPS.jpg" }}" alt="Profile">
                            <div class="pt-2">
                                <input type="file" name="foto" id="foto" class="form-control" onchange="previewImage()">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="{{ Auth::user()->info()->nama ?? old('nama') }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nim" class="col-md-4 col-lg-3 col-form-label">NIM</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nim" type="text" class="form-control" id="nim" value="{{ Auth::user()->info()->nim ?? old('nim') }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="kelas" class="col-md-4 col-lg-3 col-form-label">Kelas</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="kelas" type="text" class="form-control" id="kelas" value="{{ Auth::user()->info()->kelas ?? old('kelas') }}" required>
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" {{ (Auth::user()->info()->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ (Auth::user()->info()->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>                                                 

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" value="{{ Auth::user()->info()->email ?? old('email') }}" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_hp" type="text" class="form-control" id="no_hp" value="{{ Auth::user()->info()->no_hp ?? old('no_hp') }}" required>
                      </div>
                    </div>                  

                    <div class="row mb-3 mt-3">
                        <label for="alamat_1" class="col-md-4 col-lg-3 col-form-label">Alamat Domisili Utama</label>
                        <div class="col-md-4 col-lg-5">
                          <textarea name="alamat_1" type="area" class="form-control" id="alamat_1" value="" style="height: 137px" required>{{ Auth::user()->info()->alamat_1 }}</textarea>
                        </div>
                        <div class="col-md-4 mt-lg-0 mt-md-0">
                          <div class="form-floating">
                            <select
                              class="form-select"
                              id="provinsi-alamat-1"
                              aria-label="provinsi-alamat-1"
                              name = "id_prov_1"
                              required
                            >
                            @if (Auth::user()->info()->kabKotaAlamat1)
                                <option value="{{ Auth::user()->info()->kabKotaAlamat1->id_prov }}">{{ Auth::user()->info()->kabKotaAlamat1->provinsi->nama }}</option>
                            @else
                                <option value="">Provinsi</option>
                            @endif
                            </select>
                            <label for="provinsi-alamat-1">Provinsi</label>
                          </div>
                          <div class="form-floating mt-3">
                            <select
                              class="form-select"
                              id="kabkota-alamat-1"
                              aria-label="kabkota-alamat-1"
                              name = "id_kab_kota_alamat_1"
                              required
                            >
                            @if (Auth::user()->info()->kabKotaAlamat1)
                                <option value="{{ Auth::user()->info()->kabKotaAlamat1->id }}">{{ Auth::user()->info()->kabKotaAlamat1->nama }}</option>
                            @else
                                <option value="">Pilih Provinsi Dahulu</option>
                            @endif
                            </select>
                            <label for="kabkota-alamat-1">Kabupaten/Kota</label>
                          </div>
                        </div>
                        {{-- <div class="col-md-3 mt-lg-0 mt-md-0">
                        </div> --}}
                    </div>
                    
                    <div class="row mb-3 mt-3">
                      <label for="alamat_2" class="col-md-4 col-lg-3 col-form-label">Alamat Lain di Luar Domisili (Opsional)</label>
                      <div class="col-md-4 col-lg-5">
                        <textarea name="alamat_2" type="area" class="form-control" id="alamat_2" value="" style="height: 137px">{{ Auth::user()->info()->alamat_2 }}</textarea>
                      </div>
                      <div class="col-md-4 mt-lg-0 mt-md-0">
                        <div class="form-floating">
                          <select
                            class="form-select"
                            id="provinsi-alamat-2"
                            aria-label="provinsi-alamat-2"
                            name = "id_prov_2"
                          >
                          @if (Auth::user()->info()->kabKotaAlamat2)
                              <option value="{{ Auth::user()->info()->kabKotaAlamat2->id_prov ?? old('id_prov_2') }}">{{ Auth::user()->info()->kabKotaAlamat2->provinsi->nama }}</option>
                          @else
                              <option value="">Provinsi</option>
                          @endif
                          </select>
                          <label for="provinsi-alamat-2">Provinsi</label>
                        </div>
                        <div class="form-floating mt-3">
                          <select
                            class="form-select"
                            id="kabkota-alamat-2"
                            aria-label="kabkota-alamat-2"
                            name = "id_kab_kota_alamat_2"
                          >
                          @if (Auth::user()->info()->kabKotaAlamat2)
                              <option value="{{ Auth::user()->info()->kabKotaAlamat2->id ?? old('id_kab_kota_alamat_2') }}">{{ Auth::user()->info()->kabKotaAlamat2->nama }}</option>
                          @else
                              <option value="">Pilih Provinsi Dahulu</option>
                          @endif
                          </select>
                          <label for="kabkota-alamat-2">Kabupaten/Kota</label>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row mb-3 mt-3">
                        <label for="bank" class="col-md-4 col-lg-3 col-form-label">Bank</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="bank" type="bank" class="form-control" id="bank" value="{{ Auth::user()->info()->bank ?? old('bank') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="an_bank" class="col-md-4 col-lg-3 col-form-label">Atas Nama Bank</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="an_bank" type="an_bank" class="form-control" id="an_bank" value="{{ Auth::user()->info()->an_bank ?? old('an_bank') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="no_rek" class="col-md-4 col-lg-3 col-form-label">No Rekening</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="no_rek" type="no_rek" class="form-control" id="no_rek" value="{{ Auth::user()->info()->no_rek ?? old('no_rek') }}">
                        </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
    function previewImage() {
        var input = document.getElementById('foto');
        var preview = document.getElementById('fotoPreview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
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
                      $('#provinsi-alamat-1').append(new Option(nama, id));
                  });
              },
              error: function (error) {
                  console.error('Error fetching provinces:', error);
              }
          });
  
          // Menangani perubahan pada dropdown provinsi
          $('#provinsi-alamat-1').change(function () {
              var idProvinsi = $(this).val();
  
              // Mengosongkan dropdown kota
              $('#kabkota-alamat-1').empty().append(new Option('Pilih Kabupaten/Kota', ''));
  
              // Mengisi dropdown kota berdasarkan provinsi yang dipilih
              if (idProvinsi) {
                  $.ajax({
                      url: '/get-kota/' + idProvinsi,
                      type: 'GET',
                      success: function (response) {
                          $.each(response, function (id, nama) {
                              $('#kabkota-alamat-1').append(new Option(nama, id));
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
                      $('#provinsi-alamat-2').append(new Option(nama, id));
                  });
              },
              error: function (error) {
                  console.error('Error fetching provinces:', error);
              }
          });
  
          // Menangani perubahan pada dropdown provinsi
          $('#provinsi-alamat-2').change(function () {
              var idProvinsi = $(this).val();
  
              // Mengosongkan dropdown kota
              $('#kabkota-alamat-2').empty().append(new Option('Pilih Kabupaten/Kota', ''));
  
              // Mengisi dropdown kota berdasarkan provinsi yang dipilih
              if (idProvinsi) {
                  $.ajax({
                      url: '/get-kota/' + idProvinsi,
                      type: 'GET',
                      success: function (response) {
                          $.each(response, function (id, nama) {
                              $('#kabkota-alamat-2').append(new Option(nama, id));
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