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
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/icon.png') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link">

    <!-- Phosphor Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">

    <!-- Feather Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

    <!-- Material Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">


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
                    <img src="{{ asset('image/LOGOWEB.png') }}" alt="" style="width: 150px;" />
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
                        <a href="{{ route('admin.dashboard') }}" class="pc-link"><span class="pc-micon"><i
                                    class="ti ti-dashboard"></i></span><span class="pc-mtext">Home</span></a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Siswa</label>
                        <i class="ti ti-news"></i>
                    </li>
                    <li class="pc-item">
                        <a class="pc-link" href="{{ route('admin.tahun') }}">
                            <span class="pc-micon"><i class="ti ti-lock"></i></span>
                            <span class="pc-mtext">Tahun Ajaran</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a class="pc-link" href="{{ route('ppdb') }}">
                            <span class="pc-micon"><i class="ti ti-lock"></i></span>
                            <span class="pc-mtext">PPDB</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.siswa') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                            <span class="pc-mtext">Data Siswa Baru</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Edit</label>
                        <i class="ti ti-brand-chrome"></i>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="#" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
                                class="pc-mtext">Edit Konten</span><span class="pc-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="#"
                                    onclick="alert('page masih dalam tahap pengembangan'); return false;">Berita
                                    Sekolah</a></li>
                            <li class="pc-item pc-hasmenu">
                                <a href="#" class="pc-link">Profil<span class="pc-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="/editsambutan">Sambutan Kepala
                                            Sekolah</a></li>
                                    <li class="pc-item"><a class="pc-link" href="/visi-admin">Visi & Misi</a></li>
                                    <li class="pc-item"><a class="pc-link" href="/sejarah-admin">Sejarah</a></li>
                                    <li class="pc-item"><a class="pc-link" href="/struktur-admin">Struktur
                                            Orgnisasi</a></li>
                                    <li class="pc-item"><a class="pc-link" href="/profilks">Profil Kepala Sekolah</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pc-item pc-hasmenu">
                                <a href="#!" class="pc-link">Keunggulan<span class="pc-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="#!">Sarana dan Prasarana</a>
                                    </li>
                                    <li class="pc-item"><a class="pc-link" href="#!">E-Perpus</a>
                                    </li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Ekstrakurikuler</a></li>

                                </ul>
                            </li>

                            <li class="pc-item pc-hasmenu">
                                <a href="#!" class="pc-link">Siswa<span class="pc-arrow"><i
                                            data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="#!">Pengelolaan Organisasi</a>
                                    </li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Prestasi Siswa</a></li>
                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">Organisasi Siswa<span class="pc-arrow"><i
                                                    data-feather="chevron-right"></i></span>
                                        </a>
                                        <ul class="pc-submenu">
                                            <li class="pc-item"><a class="pc-link" href="#!">Osis</a></li>
                                        </ul>
                                    </li>
                                    <li class="pc-item pc-hasmenu">
                                        <a href="#!" class="pc-link">Pendaftaran Kegiatan<span
                                                class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                        </a>
                                        <ul class="pc-submenu">
                                            <li class="pc-item"><a class="pc-link" href="#!">PKL</a></li>
                                            <li class="pc-item"><a class="pc-link" href="#!">Studi Tour</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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
    <header class="pc-header">
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
                        <div class="ket">
                            <p class="mb-0">SIM Akademik</p>
                            <h3 style="color:#51BE8C;">MA AL-IHSAN</h3>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="{{ asset('image/icon.png') }}" alt="user-image" class="user-avtar" />
                            <span>
                                <i class="ti ti-settings"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <h4>
                                    Assalamualaikum,
                                    <span class="small text-muted">{{ Auth::user()->name }}</span>
                                </h4>
                                <p class="text-muted">Admin</p>
                                <hr />
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 280px)">

                                    <button class="dropdown-item" id="btnAccountModal">
                                        <i class="ti ti-settings"></i>
                                        <span>Account Settings</span>
                                    </button>

                                    <form action="{{ route('logout.admin') }}" method="post">
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


    @yield('kontenAdmin')

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
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>



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


    <!-- Apex Chart -->
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>

    <!-- [Page Specific JS] end -->
    <!-- AccountModal -->
    <div class="modal fade" id="accountSettingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Penaturan Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput"
                                placeholder="Email address / Username" />
                            <label for="floatingInput">Nama : {{ Auth::user()->name }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput"
                                placeholder="Email address / Username" />
                            <label for="floatingInput">Email : {{ Auth::user()->email }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput"
                                placeholder="Email address / Username" />
                            <label for="floatingInput">Ganti Password : </label>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- [Body] end -->

</html>
