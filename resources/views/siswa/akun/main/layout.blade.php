<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>@yield('title')| MA AL-IHSAN</title>

    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- [Favicon] icon -->
    <link rel="icon" href="/image/icon.png">
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="../assets/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="../assets/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="../assets/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="../assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="../assets/css/style-preset.css" />
    <link rel="stylesheet" href="../assets/css/style-ok.css" />
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        .wa-container {
            position: fixed;
            bottom: 50px;
            right: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1054;
        }

        .wa-text {
            background: #f1f1f1;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            font-family: Arial, sans-serif;
        }

        .wa-button {
            background-color: #25D366;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-decoration: none;
            transition: 0.3s;
        }

        .wa-button:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="/admin" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="/image/LOGOWEB.png" alt="" style="width: 150px;" />
                </a>
            </div>
            <div class="container">
                <hr>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Dashboard</label>
                        <i class="ti ti-dashboard"></i>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('siswa.dashboard') }}" class="pc-link"><span class="pc-micon"><i
                                    class="ti ti-dashboard"></i></span><span class="pc-mtext">Home</span></a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Siswa</label>
                        <i class="ti ti-news"></i>
                    </li>
                    @if (Auth::guard('siswa')->check() && Auth::guard('siswa')->user()->status == 'selesai')
                        <li class="pc-item">
                            <a class="pc-link" id="absensi">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Absensi</span>
                            </a>
                        </li>
                    @else
                        <li class="pc-item">
                            <a class="pc-link" href="">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Absensi</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::guard('siswa')->check() && Auth::guard('siswa')->user()->status == 'selesai')
                        <li class="pc-item">
                            <a class="pc-link" id="nilai">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Nilai</span>
                            </a>
                        </li>
                    @else
                        <li class="pc-item">
                            <a class="pc-link" href="">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Nilai</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::guard('siswa')->check() && Auth::guard('siswa')->user()->status == 'selesai')
                        <li class="pc-item">
                            <a class="pc-link" id="pembayaran">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Pembayaran</span>
                            </a>
                        </li>
                    @else
                        <li class="pc-item">
                            <a class="pc-link" href="">
                                <span class="pc-micon"><i class="ti ti-lock"></i></span>
                                <span class="pc-mtext">Pembayaran</span>
                            </a>
                        </li>
                    @endif

                </ul>
                <div class="pc-navbar-card bg-primary rounded">
                    <img src="/image/LOGOWEB.png" alt="user-image" width="140"
                        style="background-color: white;
    border-radius: 5px;
    padding: 5px;
    margin-bottom: 15px;" />

                </div>
                <div class="w-100 text-center">
                    <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header" style="background-color: #0AA05A; padding-top:10px; padding-bottom:10px;">
        <div class="header-wrapper"><!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item header-mobile-collapse">
                        <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item">
                        <div class="ket ms-2">
                            <p class="mb-0" style="color:#FFFFFF;">SIM Pendaftaran</p>
                            <h3 style="color:#FFFFFF;">MA AL-IHSAN</h3>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ auth('siswa')->user()->foto
                                ? asset('storage/profile/' . auth('siswa')->user()->foto)
                                : asset('image/default.jpg') }}"
                                alt="user-image" class="profile-img-avatar" />
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <h4>
                                    Assalamualaikum,
                                </h4>
                                <p class="text-muted">{{ Auth::guard('siswa')->user()->nama }}</p>
                                <hr />
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 280px)">
                                    @if (
                                        (Auth::guard('siswa')->check() && Auth::guard('siswa')->user()->status == 'selesai') ||
                                            Auth::guard('siswa')->user()->status == 'siswa')
                                        <button type="button" class="dropdown-item" id="btnAccountModal">
                                            <i class="ti ti-settings"></i>
                                            <span>Edit Profil</span>
                                        </button>
                                    @else
                                        <button type="button" class="dropdown-item" id="blockedProfileBtn">
                                            <i class="ti ti-settings"></i>
                                            <span>Edit Profil</span>
                                        </button>
                                    @endif
                                    <form action="{{ route('logout.siswa') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="ti ti-logout"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->


    @yield('kontenSiswa')

    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">
                        &#169; 2025 MA AL-IHSAN IT Team

                    </p>
                </div>

            </div>
        </div>
    </footer>
    <!-- WhatsApp Floating Button -->
    <div class="wa-container">
        <div class="wa-text">Mau bertanya sesuatu ?</div>
        <a href="https://wa.me/6282119436806?text=Assalamualaikum,%0A%0ASaya%20{{auth('siswa')->user()->nama}},%20saya%20ingin%20bertanya" target="_blank" class="wa-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" width="30">
        </a>
    </div>

    <!-- Required Js -->
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/icon/custom-font.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('btnAccountModal');
            const modalEl = document.getElementById('accountSettingModal');

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // 🔥 penting untuk Berry

                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            });
        });
    </script>


    <script>
        layout_change('light');
    </script>

    <script>
        font_change('Roboto');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_caption_change('true');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const blockedBtn = document.getElementById("blockedProfileBtn");

            if (blockedBtn) {
                blockedBtn.addEventListener("click", function() {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Akses Ditolak',
                        text: 'Lakukan daftar ulang terlebih dahulu!',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#3085d6'
                    });

                });
            }

            const blockedBtn1 = document.getElementById("absensi");

            if (blockedBtn1) {
                blockedBtn1.addEventListener("click", function() {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Akses Ditolak',
                        text: 'Anda tidak bisa mengakses halaman ini, Lakukan daftar ulang terlebih dahulu!',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#3085d6'
                    });

                });
            }

             const blockedBtn7 = document.getElementById("pembayaran");

            if (blockedBtn7) {
                blockedBtn7.addEventListener("click", function() {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Akses Ditolak',
                        text: 'Anda tidak bisa mengakses halaman ini, Lakukan daftar ulang terlebih dahulu!',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#3085d6'
                    });

                });
            }

            const blockedBtn2 = document.getElementById("nilai");

            if (blockedBtn2) {
                blockedBtn2.addEventListener("click", function() {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Akses Ditolak',
                        text: 'Anda tidak bisa mengakses halaman ini, Lakukan daftar ulang terlebih dahulu!',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#3085d6'
                    });

                });
            }

            const blockedBtn3 = document.getElementById("nilai");

            if (blockedBtn3) {
                blockedBtn3.addEventListener("click", function() {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Akses Ditolak',
                        text: 'Anda tidak bisa mengakses halaman ini, Lakukan daftar ulang terlebih dahulu!',
                        confirmButtonText: 'Mengerti',
                        confirmButtonColor: '#3085d6'
                    });

                });
            }

        });
    </script>




    <!-- [Page Specific JS] start -->
    <!-- Apex Chart -->
    <script src="../assets/js/plugins/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>

    <!-- [Page Specific JS] end -->
    <!-- AccountModal -->
    <div class="modal fade" id="accountSettingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pengaturan Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 text-center">
                            <div class="profile-wrapper">
                                <img id="preview-image"
                                    src="{{ auth()->user()->foto ? asset('storage/profile/' . auth()->user()->foto) : asset('image/default.jpg') }}"
                                    class="profile-img">
                                <label for="photo" class="camera-btn">
                                    <i class="ti ti-camera"></i>
                                </label>
                                <input type="file" name="foto" id="photo" hidden accept="image/*">
                            </div>
                            <div class="mt-3 mb-4">
                                <small class="text-muted">Klik icon kamera untuk mengganti foto <br>
                                    <p style="color:red;">*Harap pilih foto yang sesuai untuk KTS*</p>
                                </small>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="nama" class="form-label mb-0"><strong>Nama</strong></label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ old('nama', auth('siswa')->user()->nama ?? '') }}"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="asalSekolah" class="form-label mb-0"><strong>Asal Sekolah</strong></label>
                            <input type="text" name="asalSekolah" class="form-control" id="asalSekolah"
                                value="{{ old('asalSekolah', auth('siswa')->user()->asalSekolah ?? '') }}"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="noTlp" class="form-label mb-0"><strong>No.Tlp</strong></label>
                            <input type="number" name="noTlp" class="form-control" id="noTlp"
                                value="{{ old('noTlp', auth('siswa')->user()->noTlp ?? '') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="form-label mb-0"><strong>Alamat</strong></label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat lengkap peserta" id="exampleFormControlTextarea1"
                                rows="3">{{ old('alamat', auth('siswa')->user()->alamat ?? '') }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="username" class="form-label mb-0"><strong>Username</strong></label>
                            <input type="text" name="username" class="form-control" id="username"
                                value="{{ old('username', auth('siswa')->user()->username ?? '') }}">
                        </div>
                        <div class="col-md-12 mb-4 text-center">
                            <label class="form-label"><strong>Foto Kartu Keluarga</strong></label>
                            <div class="document-wrapper">
                                <img id="preview-kk"
                                    src="{{ auth('siswa')->user()->kk ? asset('storage/' . auth('siswa')->user()->kk) : asset('image/default.jpg') }}"
                                    class="document-img">
                                <label for="kk" class="doc-btn">
                                    <i class="ti ti-upload"></i> Ganti KK
                                </label>
                                <input type="file" name="kk" id="kk" hidden accept="image/*">
                            </div>
                        </div>

                        <div class="col-md-12 mb-4 text-center">
                            <label class="form-label"><strong>Foto Ijazah SMP</strong></label>
                            <div class="document-wrapper">
                                <img id="preview-ijazah"
                                    src="{{ auth('siswa')->user()->ijazahSmp
                                        ? asset('storage/' . auth('siswa')->user()->ijazahSmp)
                                        : asset('image/default.jpg') }}"
                                    class="document-img">
                                <label for="ijazahSmp" class="doc-btn">
                                    <i class="ti ti-upload"></i> Ganti Ijazah
                                </label>
                                <input type="file" name="ijazahSmp" id="ijazahSmp" hidden accept="image/*">
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                <script>
                    function previewImage(inputId, previewId) {
                        document.getElementById(inputId).addEventListener('change', function(event) {

                            const file = event.target.files[0];

                            if (file) {
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                    document.getElementById(previewId).src = e.target.result;
                                }

                                reader.readAsDataURL(file);
                            }

                        });
                    }

                    // Jalankan untuk masing-masing
                    previewImage('photo', 'preview-image');
                    previewImage('kk', 'preview-kk');
                    previewImage('ijazahSmp', 'preview-ijazah');
                </script>


            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Pendaftaran Gagal",
                html: "{!! session('error') !!}",
            });
        </script>
    @endif




</body>
<!-- [Body] end -->

</html>
