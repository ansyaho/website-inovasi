@extends('main.app')
@section('konten')
    <!-- main -->
    <!-- Modal -->
    <div class="modal fade" id="popupAwal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b>Selamat Datang di MA AL-IHSAN</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img src="/image/brosur.jpg" class="img-doc img-fluid" alt="" srcset="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                        Daftar Sekarang !
                    </button>
                </div>
            </div>
        </div>
    </div>
    <main>
        <section class="poster-section">
            <div class="poster">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
                    data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/image/galeri-3.jpg" class="d-block image-poster" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/image/galeri-4.jpg" class="d-block image-poster" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="keterangan-poster">
                <p class="judul-poster text-white">SELAMAT DATANG DI</p>
                <p class="sub-judul-poster">MA AL-IHSAN</p>
                <h2 class="isi-poster text-white"><b>MENCERDASKAN <br> BANGSA</b></h2>
                <a href="/pendaftaranSiswaBaru" class="btn btn-success button-daftar"><i class="bi bi-book"></i> Informasi
                    Penerimaan Siswa Baru</a>
            </div>
        </section>

        <!-- Action -->
        <section class="action container">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,256L30,250.7C60,245,120,235,180,234.7C240,235,300,245,360,245.3C420,245,480,235,540,234.7C600,235,660,245,720,245.3C780,245,840,235,900,218.7C960,203,1020,181,1080,154.7C1140,128,1200,96,1260,112C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
            <div class="isi-action container">
                <h3 class="judul-action">MADRASAH ALIYAH AL-IHSAN</h3>
                <div class="s-j">
                    <h2 class="sub-judul-action">
                        Selalu Terdepan dan <b class="mark-action"> Memberi Solusi </b> Dalam Mewujudkan SDM Unggul
                    </h2>
                </div>
                <h6 class="motivation-action">
                    Wisdom of the week: "
                    <b class="em"><i> Pengetahuan yang baik adalah yang memberi manfaat, bukan yang hanya diingat
                        </i></b>
                    "
                </h6>
                <h6 class="motivation-people">~Muhammad Ma'mun Murod, S.E.I~</h6>

                <div class="row row-action">
                    <div class="col-md-6">
                        <a href="#" class="card-btn-action">
                            <div class="card card-action">
                                <i class="bi bi-person-workspace icon-action"></i>
                                <h3 class="heading"><b>Muatan Lokal</b></h3>
                                <p class="description">Pemilihan Muatan Lokal di MA AL-IHSAN</p>
                                <p class="btn-action">Selengkapnya -></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="card-btn-action">
                            <div class="card card-action">
                                <i class="bi bi-building icon-action"></i>
                                <h3 class="heading"><b>Ekstrakurikuler</b></h3>
                                <p class="description">Memiliki sejumlah ekstrakurikuler untuk menunjang bakat dan minat
                                    siswa</p>
                                <p class="btn-action">Selengkapnya -></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Doc -->
        <section class="documentation">
            <div class="bg"></div>
            <svg xmlns="http://www.w3.org/2000/svg" class="svg-action-2" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1" d="M0,0L480,64L960,160L1440,64L1440,0L960,0L480,0L0,0Z"></path>
            </svg>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt">
                        <img src="/image/brosur.jpg" height="530" class="img-doc" alt="" srcset="">
                    </div>
                    <div class="col-md-8 mt ps">
                        <h2 class="judul-doc"><b>SEGERA DAFTAR</b>
                            <div class="mark-doc">Sebelum Kuota Penuh!</div>
                        </h2>
                        <p class="description-doc mt-4">
                            Pendidikan merupakan sebuah tools untuk mencetak generasi penerus bangsa yang berkualitas.
                            Persatuan Guru Republik Indonesia (PGRI) sebagai organisasi perjuangan,
                            ketenagakerjaan, dan profesi guru yang menjadi mitra strategis pemerintah di bidang pendidikan.
                        </p>
                        <iframe class="video" src="https://www.youtube.com/embed/cmIJJfK_Zfo" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>

                    </div>
                </div>
            </div>
        </section>

        <!-- news -->
        <section class="news">
            <div class="container news-content">
                <h2 class="judul-news">School News</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card main-card-news" style="width: 100%">
                            <img src="/image/bg-1.jpg" class="card-img-top image-news" alt="...">
                            <div class="card-body col-news">
                                <h5 class="card-title"><b>PELAKSANAAN PTD DAN PAS GENAP</b></h5>
                                <h6 class="time-news"><i class="bi bi-calendar3"></i> Juni 12, 2025</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Atque fugiat maxime sit? Commodi voluptas iure in facilis cum, sit, voluptatem,
                                    repellat maiores itaque nemo iusto. Reprehenderit velit qui ducimus? Explicabo!
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis maxime natus
                                    laborum optio reprehenderit sapiente esse
                                    aperiam est quae enim obcaecati sit voluptatum molestiae, veniam dolor quasi et pariatur
                                    ut!</p>
                                <a href="#" class="btn btn-success button-daftar">Read More..</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="agenda">
                            <h2 class="agenda-news">Hot News</h2>
                            <hr class="garis-news">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                    <div class="row g-0">
                                        <div class="col-md-3" style="padding: 10px; height:80%">
                                            <img src="/image/icon.png" style="width: 100%; height: 100%;"
                                                class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted" style="font-size: 16px"><b>PELAKSANAAN
                                                        PTD DAN PAS GENAP</b></h5>
                                                <p style="margin: 0;" class="card-text"><small class="text-muted">Last
                                                        updated 3 mins ago</small></p>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit.</p>
                                                <a href="#" class="btn btn-success button-daftar">Read More..</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                    <div class="row g-0">
                                        <div class="col-md-3" style="padding: 10px; height:80%">
                                            <img src="/image/icon.png" style="width: 100%; height: 100%;"
                                                class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted" style="font-size: 16px"><b>PELAKSANAAN
                                                        PTD DAN PAS GENAP</b></h5>
                                                <p style="margin: 0;" class="card-text"><small class="text-muted">Last
                                                        updated 3 mins ago</small></p>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit.</p>
                                                <a href="#" class="btn btn-success button-daftar">Read More..</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card mb-3" style="max-width: 100%; max-height: max-content">
                                    <div class="row g-0">
                                        <div class="col-md-3" style="padding: 10px; height:80%">
                                            <img src="/image/icon.png" style="width: 100%; height: 100%;"
                                                class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted" style="font-size: 16px"><b>PELAKSANAAN
                                                        PTD DAN PAS GENAP</b></h5>
                                                <p style="margin: 0;" class="card-text"><small class="text-muted">Last
                                                        updated 3 mins ago</small></p>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit.</p>
                                                <a href="#" class="btn btn-success button-daftar">Read More..</a>
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

        <!-- Galeri -->
        <section class="galeri">
            <div class="container">
                <hr>
                <h2 class="judul-news">Galeri Foto</h2>
                <div class="row" style="column-gap:10px; justify-content: center;">
                    <div class="col-lg-4 dd" style="width:30%;">
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-8.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-10.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-4.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-11.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 dd" style="width:30%;">
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-1.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-3.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-2.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 dd" style="width:30%;">
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-6.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-5.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-7.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>
                        <div class="row mb-4 photo-galeri">
                            <img src="/image/galeri-9.jpg" class="galeri-item" style="padding: 0; border-radius: 10px;"
                                alt="">
                        </div>

                    </div>
                </div>
                <hr>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (!localStorage.getItem("popupSudahMuncul")) {
                var myModal = new bootstrap.Modal(document.getElementById('popupAwal'));
                myModal.show();
                localStorage.setItem("popupSudahMuncul", "yes");
            }
        });
    </script>
@endsection
