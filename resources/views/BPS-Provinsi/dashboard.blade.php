@extends('layouts.main') @section('container') @include('partials.sidebar-prov')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard BPS Provinsi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/bps-provinsi/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active">Ringkasan Informasi</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">BPS Provinsi</h5>

                            <div
                                class="d-flex align-items-center justify-content-center"
                            >
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="bi bi-bar-chart"
                                        style="font-size: 2rem"
                                    ></i>
                                    <!-- Mengatur ukuran ikon -->
                                </div>
                            </div>

                            <a
                                href="/bps-provinsi/approvalmahasiswa/{{ Auth::user()->info()->kabKota->provinsi->id }}"
                                class="btn btn-primary btn-lg my-1"
                                >Approval Mahasiswa</a
                            >
                            <a
                                href="/bps-provinsi/bandingmahasiswa/{{ Auth::user()->info()->kabKota->provinsi->id }}"
                                class="btn btn-primary btn-lg my-1"
                                >Banding Mahasiswa</a
                            >
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Informasi</h5>

                            <div
                                class="d-flex align-items-center justify-content-center"
                            >
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                >
                                    <i
                                        class="bi bi-bar-chart"
                                        style="font-size: 2rem"
                                    ></i>
                                    <!-- Mengatur ukuran ikon -->
                                </div>
                            </div>

                            <div class="align-items-center text-center">
                                <div class="col">
                                    <a
                                        class="btn p-3 mb-2 border border-success m-2 text-white bg-success"
                                        >Total Pengajuan<br /><b>
                                            : {{$totalPengajuan}} Mahasiswa</b
                                        ></a
                                    >
                                </div>
                                <div class="col">
                                    <a
                                        class="btn p-3 mb-2 border border-success m-2 text-white bg-success"
                                        >Total Banding<br /><b
                                            >: {{$totalBanding}} Mahasiswa</b
                                        ></a
                                    >
                                </div>

                                <div class="col">
                                    <a
                                        class="btn p-3 mb-2 border border-success m-2 text-white bg-success"
                                        >Total Approval<br /><b
                                            >: {{$totalApproval}} Mahasiswa</b
                                        ></a
                                    >
                                </div>
                                <div class="col">
                                    <a
                                        class="btn p-3 mb-2 border border-success m-2 text-white bg-success"
                                        >Belum Approval<br /><b
                                            >: {{$belumApproval}} Mahasiswa</b
                                        ></a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Sebaran Pengajuan Lokasi Mahasiswa
                            </h5>

                            <!-- Bar Chart -->
                            <div id="barChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    // Initialize arrays for categories and data
                                    let categories = [];
                                    let data = [];

                                    // Iterate through the pemilihan_lokasi collection
                                    @foreach ($pemilihan_lokasis as $lokasi)
                                        //let lksCount = {{ \App\Models\Instansi::where('id', $lokasi->id_instansi)->count() }};
                                        @php
                                              $lks = \App\Models\Instansi::where('id', $lokasi->id_instansi)->get();
                                              $lks1 = \App\Models\Instansi::where('id', $lokasi->id_instansi)->pluck('nama')->first();
                                              //$lks = \App\Models\Instansi::where('id', $lokasi->id_instansi)->pluck('id')->first();
                                              $lksCount = $lks->count();
                                              // if ($lksCount === 0) {
                                              //     $lksCount = 10;
                                              // }
                                        @endphp

                                        categories.push("{{ $lks1 }}");
                                        data.push({{ $lksCount }});
                                    @endforeach

                                    // Use the generated categories and data in the chart
                                    new ApexCharts(document.querySelector("#barChart"), {
                                        series: [{
                                            data: data,
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 7,
                                                horizontal: true,
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        xaxis: {
                                            categories: categories,
                                        },
                                        yaxis: {
                                            min: 0,    // Set the minimum value for the y-axis
                                            max: 10,   // Set the maximum value for the y-axis
                                            tickAmount: 5,  // Set the number of ticks on the y-axis
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Bar Chart -->
                        </div>
                    </div>
                </div>

                {{--
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Sebaran Pengajuan Lokasi Mahasiswa
                            </h5>

                            <!-- Bar Chart -->
                            <div id="barChart"></div>

                            <script>
                                document.addEventListener(
                                    "DOMContentLoaded",
                                    () => {
                                        new ApexCharts(
                                            document.querySelector("#barChart"),
                                            {
                                                series: [
                                                    {
                                                        data: [
                                                            400, 448, 470, 1100,
                                                            1200, 1380,
                                                        ],
                                                    },
                                                ],
                                                chart: {
                                                    type: "bar",
                                                    height: 350,
                                                },
                                                plotOptions: {
                                                    bar: {
                                                        borderRadius: 7,
                                                        horizontal: true,
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false,
                                                },
                                                xaxis: {
                                                    categories: [
                                                        "Jakarta Pusat",
                                                        "Jakarta Utara",
                                                        "Jakarta Selatan",
                                                        "Jakarta Timur",
                                                        "Jakarta Barat",
                                                        "Kepulauan Seribu",
                                                    ],
                                                },
                                            }
                                        ).render();
                                    }
                                );
                            </script>
                            <!-- End Bar Chart -->
                        </div>
                    </div>
                </div>
            </div>
            --}}
        </div>
        <!-- End Revenue Card -->
    </section>
</main>
<!-- End #main -->
@endsection
