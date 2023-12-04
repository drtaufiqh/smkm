@extends('layouts.main')


@php
  $finalisasiDone = \App\Models\Finalisasi::isFinalisasiPenentuanAdminDone();
  // $finalisasiDone = false;
@endphp

@section('container')
  @include('partials.sidebar-admin')
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penentuan Lokasi Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Penentuan Lokasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title text-lg-center">Penentuan Lokasi oleh Admin</h5>
            @include('komponen.pesan')
              <div class="table-responsive">
                <table class="table datatable text-center">
                  <thead>
                    <tr>
                      <th scope="col">Nomor</th>
                      <th scope="col">Nama Mahasiswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Pilihan 1</th>
                      <th scope="col">Pilihan 2</th>
                      <th scope="col">Alamat Domisili Utama</th> 
                      <th scope="col">Alamat Lain</th> 
                      <th scope="col">Pengajuan Lokasi Magang</th>
                      @if (!$finalisasiDone) <!-- Tampilkan kolom aksi hanya jika finalisasi belum dilakukan -->
                        <th scope="col">Aksi</th>
                      @endif
                      <th scope="col">Lokasi Magang Final</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i = 0 @endphp
                    @foreach ($pemilihan_lokasis as $pemilihan_lokasi)
                    @php $i = $i + 1 @endphp
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $pemilihan_lokasi->mahasiswa->nama }}</td>
                        <td>{{ $pemilihan_lokasi->mahasiswa->kelas }}</td>
                        <td>
                          <strong>[{{ optional(optional($pemilihan_lokasi->pilihan1)->kabKota)->nama }}-{{ optional(optional(optional($pemilihan_lokasi->pilihan1)->kabKota)->provinsi)->akronim }}]</strong>
                          {{ optional($pemilihan_lokasi->pilihan1)->nama }}</td>
                        <td>
                          <strong>[{{ optional(optional($pemilihan_lokasi->pilihan2)->kabKota)->nama }}-{{ optional(optional(optional($pemilihan_lokasi->pilihan2)->kabKota)->provinsi)->akronim }}]</strong>
                          {{ optional($pemilihan_lokasi->pilihan2)->nama }}
                        </td>
                        <td>
                          <strong>[{{ optional($pemilihan_lokasi->mahasiswa->kabKotaAlamat1)->nama }}-{{ optional(optional($pemilihan_lokasi->mahasiswa->kabKotaAlamat1)->provinsi)->akronim }}]</strong>
                          {{ ($pemilihan_lokasi->mahasiswa->alamat_1) }}
                        </td>
                        <td>
                          <strong>[{{ optional($pemilihan_lokasi->mahasiswa->kabKotaAlamat2)->nama }}-{{ optional(optional($pemilihan_lokasi->mahasiswa->kabKotaAlamat2)->provinsi)->akronim }}]</strong>
                          {{ ($pemilihan_lokasi->mahasiswa->alamat_2) }}
                        </td>
                        <td id="ajuan_{{ $pemilihan_lokasi->id }}">
                          {{ optional($pemilihan_lokasi->instansiAjuan)->nama ?? "-" }}
                        </td>                        
                        @if (!$finalisasiDone) 
                            <td>
                                {{-- <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_2 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 1</button>
                                </form> --}}
                                <button data-id_lok="{{ $pemilihan_lokasi->id }}" data-id_pil="{{ ($pemilihan_lokasi->id_pilihan_1) }}" data-nama="{{ optional($pemilihan_lokasi->pilihan1)->nama }}" class="btn btn-success mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 1</button>
                                <button data-id_lok="{{ $pemilihan_lokasi->id }}" data-id_pil="{{ ($pemilihan_lokasi->id_pilihan_2) }}" data-nama="{{ optional($pemilihan_lokasi->pilihan2)->nama }}" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 2</button>
                                {{-- <form action="/admin/do_tentukanlokasi/{{ $pemilihan_lokasi->id }}/{{ $pemilihan_lokasi->id_pilihan_2 }}" class="form-tentukan-lokasi" method="post">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-warning mb-2 btn-tentukan-lokasi check" style="color: white;">Pilihan 2</button>
                                </form> --}}
                            </td>
                        @endif
                        @if ($pemilihan_lokasi->mahasiswa->instansi != NULL)
                          <td>{{ $pemilihan_lokasi->mahasiswa->instansi->nama }}</td>
                        @else
                        <td>-</td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
          </div>
        </div>
      </div>
  

      @if (!$finalisasiDone)
      <div class="text-center">
        <form action='/admin/do_finalisasi_lokasi' method="post">
          @csrf 
          @method('PUT')
          <button type="submit" class="btn btn-primary btn-lg">Finalisasi</button>
        </form>
      </div>
      @else
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <i class="bi bi-info-circle me-1"></i>
        Telah dilakukan finalisasi pengajuan lokasi
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
      </div>
      @endif

    </section>

  </main>
@endsection

@section('js-bang')
<script>
  $(document).ready(function() {
      $('.btn-tentukan-lokasi').click(function() {
          var idLok = $(this).data('id_lok');
          var idPil = $(this).data('id_pil');
          var nama = $(this).data('nama');
          var newValue = nama;
          var ajuanElem = $('#ajuan_' + idLok + '');
  
          $.ajax({
              url: '/admin/do_tentukanlokasi/' + idLok + '/' + idPil,
              type: 'GET',
              // data: { new_value: newValue, _token: '{{ csrf_token() }}' },
              success: function (response) {
                  if (response.success) {
                      // Update nilai di tabel
                      console.log(idLok);
                      console.log('ajuanElem length:', ajuanElem.length); // Cek panjang elemen yang dipilih di konsol
                      ajuanElem.text(nama);
                      // alert(response.message);
                  } else {
                      alert('Gagal mengubah nilai.');
                  }
              },
              error: function (error) {
                  console.log(error);
              }
          });
      });
      
      // if (select(".toggle-sidebar-btn")) {
        $(".toggle-sidebar-btn").click(function (e) {
          $("body").toggleClass("toggle-sidebar");
        });
      // }
      
      /**
       * Easy selector helper function
       */
      const select = (el, all = false) => {
        el = el.trim();
        if (all) {
          return [...document.querySelectorAll(el)];
        } else {
          return document.querySelector(el);
        }
      };

      /**
       * Easy event listener function
       */
      const on = (type, el, listener, all = false) => {
        if (all) {
          select(el, all).forEach((e) => e.addEventListener(type, listener));
        } else {
          select(el, all).addEventListener(type, listener);
        }
      };

      /**
       * Easy on scroll event listener
       */
      const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
      };

      /**
       * Tambah Log Book toggle
       */
      if (select(".btn-add-lb")) {
        on("click", ".btn-add-lb", function (e) {
          select(".form-log-book").classList.toggle("d-none");
        });
      }

      /**
       * Navbar links active state on scroll
       */
      let navbarlinks = select("#navbar .scrollto", true);
      const navbarlinksActive = () => {
        let position = window.scrollY + 200;
        navbarlinks.forEach((navbarlink) => {
          if (!navbarlink.hash) return;
          let section = select(navbarlink.hash);
          if (!section) return;
          if (
            position >= section.offsetTop &&
            position <= section.offsetTop + section.offsetHeight
          ) {
            navbarlink.classList.add("active");
          } else {
            navbarlink.classList.remove("active");
          }
        });
      };
      window.addEventListener("load", navbarlinksActive);
      onscroll(document, navbarlinksActive);

      /**
       * Toggle .header-scrolled class to #header when page is scrolled
       */
      let selectHeader = select("#header");
      if (selectHeader) {
        const headerScrolled = () => {
          if (window.scrollY > 100) {
            selectHeader.classList.add("header-scrolled");
          } else {
            selectHeader.classList.remove("header-scrolled");
          }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
      }

      /**
       * Back to top button
       */
      let backtotop = select(".back-to-top");
      if (backtotop) {
        const toggleBacktotop = () => {
          if (window.scrollY > 100) {
            backtotop.classList.add("active");
          } else {
            backtotop.classList.remove("active");
          }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
      }

      /**
       * Initiate tooltips
       */
      var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
      );
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });

      /**
       * Initiate quill editors
       */
      if (select(".quill-editor-default")) {
        new Quill(".quill-editor-default", {
          theme: "snow",
        });
      }

      if (select(".quill-editor-bubble")) {
        new Quill(".quill-editor-bubble", {
          theme: "bubble",
        });
      }

      if (select(".quill-editor-full")) {
        new Quill(".quill-editor-full", {
          modules: {
            toolbar: [
              [
                {
                  font: [],
                },
                {
                  size: [],
                },
              ],
              ["bold", "italic", "underline", "strike"],
              [
                {
                  color: [],
                },
                {
                  background: [],
                },
              ],
              [
                {
                  script: "super",
                },
                {
                  script: "sub",
                },
              ],
              [
                {
                  list: "ordered",
                },
                {
                  list: "bullet",
                },
                {
                  indent: "-1",
                },
                {
                  indent: "+1",
                },
              ],
              [
                "direction",
                {
                  align: [],
                },
              ],
              ["link", "image", "video"],
              ["clean"],
            ],
          },
          theme: "snow",
        });
      }

      /**
       * Initiate TinyMCE Editor
       */
      const useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
      const isSmallScreen = window.matchMedia("(max-width: 1023.5px)").matches;

      tinymce.init({
        selector: "textarea.tinymce-editor",
        plugins:
          "preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons",
        editimage_cors_hosts: ["picsum.photos"],
        menubar: "file edit view insert format tools table help",
        toolbar:
          "undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
        toolbar_sticky: true,
        toolbar_sticky_offset: isSmallScreen ? 102 : 108,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        link_list: [
          {
            title: "My page 1",
            value: "https://www.tiny.cloud",
          },
          {
            title: "My page 2",
            value: "http://www.moxiecode.com",
          },
        ],
        image_list: [
          {
            title: "My page 1",
            value: "https://www.tiny.cloud",
          },
          {
            title: "My page 2",
            value: "http://www.moxiecode.com",
          },
        ],
        image_class_list: [
          {
            title: "None",
            value: "",
          },
          {
            title: "Some class",
            value: "class-name",
          },
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
          /* Provide file and text for the link dialog */
          if (meta.filetype === "file") {
            callback("https://www.google.com/logos/google.jpg", {
              text: "My text",
            });
          }

          /* Provide image and alt text for the image dialog */
          if (meta.filetype === "image") {
            callback("https://www.google.com/logos/google.jpg", {
              alt: "My alt text",
            });
          }

          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === "media") {
            callback("movie.mp4", {
              source2: "alt.ogg",
              poster: "https://www.google.com/logos/google.jpg",
            });
          }
        },
        templates: [
          {
            title: "New Table",
            description: "creates a new table",
            content:
              '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
          },
          {
            title: "Starting my story",
            description: "A cure for writers block",
            content: "Once upon a time...",
          },
          {
            title: "New list with dates",
            description: "New List with dates",
            content:
              '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
          },
        ],
        template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
        template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar:
          "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
        noneditable_class: "mceNonEditable",
        toolbar_mode: "sliding",
        contextmenu: "link image table",
        skin: useDarkMode ? "oxide-dark" : "oxide",
        content_css: useDarkMode ? "dark" : "default",
        content_style:
          "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
      });

      /**
       * Initiate Bootstrap validation check
       */
      var needsValidation = document.querySelectorAll(".needs-validation");

      Array.prototype.slice.call(needsValidation).forEach(function (form) {
        form.addEventListener(
          "submit",
          function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add("was-validated");
          },
          false
        );
      });

      /**
       * Initiate Datatables
       */
      const datatables = select(".datatable", true);
      datatables.forEach((datatable) => {
        new simpleDatatables.DataTable(datatable);
      });

      /**
       * Autoresize echart charts
       */
      const mainContainer = select("#main");
      if (mainContainer) {
        setTimeout(() => {
          new ResizeObserver(function () {
            select(".echart", true).forEach((getEchart) => {
              echarts.getInstanceByDom(getEchart).resize();
            });
          }).observe(mainContainer);
        }, 200);
      }
  });
</script>
@endsection