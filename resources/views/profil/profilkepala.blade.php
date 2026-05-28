@extends('main.app')
@section('title')
    Profile Kepala Sekolah
@endsection
@section('konten')
    <main>
        <section class="poster-sam">
            <div class="sambutan-bg-poster"></div>
            <div class=" container sam-ket">
                <h2 class="judul">PROFIL KEPALA SEKOLAH MA AL-IHSAN</h2>
                @if (!empty($data))
                    <p class="des">{{ $data->nama }}</p>

            </div>
        </section>

        <section class="profilkepala">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,256L30,250.7C60,245,120,235,180,234.7C240,235,300,245,360,245.3C420,245,480,235,540,234.7C600,235,660,245,720,245.3C780,245,840,235,900,218.7C960,203,1020,181,1080,154.7C1140,128,1200,96,1260,112C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
            <div class="container">
                <div class="row" style="gap: 20px;">
                    <div class="col-lg-4">
                        <div class="card p-2" style="box-shadow: 6px 6px 5px rgba(0, 0, 0, 0.27);">
                            <img src="/storage/{{ $data->fotoutama }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="judul-kepala">{{ $data->nama }}</h1>
                        <hr class="garis-sambutan" style="width:100%">
                        <h5 class="judul-kepala">Kepala Sekolah Madrasah Aliyah Al-Ihsan</h5>
                        <h2 class="judul-kepala mt-4" style="color:#20ad96;">Jadikan MA Al-Ihsan Berorientasi Global</h2>
                        <p class="isi-sambutan">
                            {{ $data->keterangan1 }}
                        </p>
                    </div>
                </div>
                <div class="history mb-4">
                    <div class="qualification__data">
                        <div style="justify-self: end;">
                            <h2 class="judul-kepala" style="color:#20ad96;">{{ $data->judul1 }}</h2>
                            <img src="/storage/{{ $data->foto1 }}" class="img-fluid" alt="">
                        </div>

                        <div>
                            <span class="qualification__rounder"></span>
                            <span class="qualification__line"></span>
                        </div>

                        <div class="">
                            <p class="isi-sambutan">
                                {{ $data->keterangan2 }}
                            </p>
                        </div>
                    </div>
                    <!--==================== QUALIFICATION 2 ====================-->
                    <div class="qualification__data data2">
                        <div class="" style="justify-self: end;">
                            <p class="isi-sambutan">
                                {{ $data->keterangan2 }}
                            </p>
                        </div>
                        <div>
                            <span class="qualification__rounder"></span>
                            <!-- <span class="qualification__line"></span> -->
                        </div>
                        <div>
                            <h2 class="judul-kepala" style="color:#20ad96;">{{ $data->judul2 }}</h2>
                            <img src="/storage/{{ $data->foto2 }}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
