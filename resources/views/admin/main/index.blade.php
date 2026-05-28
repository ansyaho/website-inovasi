@extends('admin.main.layout')
@section('title')
    Home
@endsection
@section('kontenAdmin')
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-8 col-md-12">
                    <div class="card bg-primary-dark dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <h3 class="text-white">Total Siswa</h3>
                            <div class="tab-content" id="chart-tab-tabContent">
                                <div class="tab-pane show active" id="chart-tab-home" role="tabpanel"
                                    aria-labelledby="chart-tab-home-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="text-white d-block f-34 f-w-500 my-2">
                                                0 Siswa

                                            </span>
                                            <p class="mb-0 opacity-50">Jumlah Siswa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="chart-tab-profile" role="tabpanel"
                                    aria-labelledby="chart-tab-profile-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="text-white d-block f-34 f-w-500 my-2">
                                                0 Siswa

                                            </span>
                                            <p class="mb-0 opacity-50">Jumlah Siswa</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="chart-tab-XII" role="tabpanel" aria-labelledby="chart-tab-XII-tab"
                                    tabindex="0">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="text-white d-block f-34 f-w-500 my-2">
                                                0 Siswa

                                            </span>
                                            <p class="mb-0 opacity-50">Jumlah Siswa</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="card bg-primary-dark dashnum-card dashnum-card-small text-white overflow-hidden">
                        <span class="round bg-primary small"></span>
                        <span class="round bg-primary big"></span>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="avtar avtar-lg">
                                    <i class="text-white ti ti-credit-card"></i>
                                </div>
                                <div class="ms-2">
                                    <h4 class="text-white mb-1">{{ $data }} Pendaftar</h4>
                                    <p class="mb-0 opacity-75 text-sm">Siswa Baru</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-xl-8 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3 align-items-center">
                                <div class="col">
                                    <h3>Pendaftaran Siswa Baru MA Al-IHSAN {{ $tahunAktif ?? 'Belum ada tahun aktif' }}</h3>
                                    <small class="text-muted">KALIJRING</small>
                                </div>
                            </div>
                            @php
                                $gelombang = [];
                                $laki = [];
                                $perempuan = [];

                                foreach ($gender as $g) {
                                    $gelombang[] = $g->gelombang;
                                    $laki[] = $g->laki;
                                    $perempuan[] = $g->perempuan;
                                }
                            @endphp
                            <canvas id="chartGelombang"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3 align-items-center">
                                <div class="col">
                                    <h4>Asal Sekolah</h4>
                                </div>
                                <div class="col-auto"></div>
                            </div>

                            <ul class="list-group list-group-flush">
                                @foreach ($asalSekolah as $sekolah)
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="mb-0">{{ $sekolah->asalSekolah }}</h5>
                                            </div>
                                            <div class="col-auto">
                                                <h4 class="mb-0">
                                                    {{ $sekolah->total }} Peserta
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <script>
        const ctx = document.getElementById('chartGelombang');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($gelombang) !!},
                datasets: [{
                        label: 'Laki-laki',
                        data: {!! json_encode($laki) !!},
                        backgroundColor: '#36A2EB'
                    },
                    {
                        label: 'Perempuan',
                        data: {!! json_encode($perempuan) !!},
                        backgroundColor: '#9966FF'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
