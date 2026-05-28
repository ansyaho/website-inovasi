@extends('main.app')
@section('title')
    Visi & Misi
@endsection
@section('konten')
    <main>
        <section class="poster-sam">
            <div class="sambutan-bg-poster"></div>
            <div class="sam-ket">
                <h2 class="judul">STRUKTUR ORGANISASI</h2>
                <p class="des">Madrasah Aliyah Al-Ihsan</p>
            </div>
        </section>

        <section class="struktur">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,256L30,250.7C60,245,120,235,180,234.7C240,235,300,245,360,245.3C420,245,480,235,540,234.7C600,235,660,245,720,245.3C780,245,840,235,900,218.7C960,203,1020,181,1080,154.7C1140,128,1200,96,1260,112C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h2 class="mark-action">
                            <b>Struktur Organisasi</b>
                        </h2>
                        <div class="card" style="box-shadow: 6px 6px 5px rgba(0, 0, 0, 0.27);">
                            @if (!empty($data->gambar))
                                <img src="/storage/{{ $data->gambar }}" alt="">
                            @endif
                        </div>
                        <p class="isi-sambutan">
                            @if (!empty($data->keterangan))
                                {!! $data->keterangan !!}
                            @else
                                <p style="color: red;">"Data Belum Tersedia"</p>
                            @endif
                        </p>
                    </div>
                    <div class="col-lg-4 ne">
                        <div class="induk">
                            <div class="flex">
                                <div class="garis-lurus"></div>
                            </div>
                            <div class="flex-2">
                                <div class="agenda">
                                    <h2 class="agenda-news">News</h2>
                                    <hr class="garis-news">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="/image/brosur.png" style="width: 100%; height: 100%;"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p style="margin: 0;" class="card-text"><small
                                                                class="text-muted">Last updated 3 mins ago</small></p>
                                                        <h5 class="card-title text-muted" style="font-size: 16px">
                                                            PELAKSANAAN PTD DAN PAS GENAP</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="/image/logo.png" style="width: 100%; height: 100%;"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p style="margin: 0;" class="card-text"><small
                                                                class="text-muted">Last updated 3 mins ago</small></p>
                                                        <h5 class="card-title text-muted" style="font-size: 16px">
                                                            PELAKSANAAN PTD DAN PAS GENAP</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="/image/brosur.png" style="width: 100%; height: 100%;"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p style="margin: 0;" class="card-text"><small
                                                                class="text-muted">Last updated 3 mins ago</small></p>
                                                        <h5 class="card-title text-muted" style="font-size: 16px">
                                                            PELAKSANAAN PTD DAN PAS GENAP</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="/image/logo.png" style="width: 100%; height: 100%;"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <p style="margin: 0;" class="card-text"><small
                                                                class="text-muted">Last updated 3 mins ago</small></p>
                                                        <h5 class="card-title text-muted" style="font-size: 16px">
                                                            PELAKSANAAN PTD DAN PAS GENAP</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
