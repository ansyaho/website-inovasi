@extends('main.app')
@section('title')
    Pendaftaran
@endsection
@section('konten')

    <main>
        <section class="poster-sam">
            <div class="sambutan-bg-poster"></div>
            <div class="sam-ket">
                <h2 class="judul">PENDAFTARAN SISWA BARU</h2>
                <p class="des">Madrasah Aliah AL-IHSAN</p>
            </div>
        </section>
        <section class="siswaBaru">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,256L30,250.7C60,245,120,235,180,234.7C240,235,300,245,360,245.3C420,245,480,235,540,234.7C600,235,660,245,720,245.3C780,245,840,235,900,218.7C960,203,1020,181,1080,154.7C1140,128,1200,96,1260,112C1320,128,1380,192,1410,224L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="agenda">
                            <h2 class="agenda-news" style="color:#3f3a64;">Browsur dan Informasi biaya</h2>
                        </div>
                        <p class="isi-sambutan">
                            Brosur dan rincian biaya pendaftaran siswa baru MA AL-IHSAN
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary-outlane p-0 btn-daftar" data-bs-toggle="modal"
                                data-bs-target="#brosurModal">
                                Lihat Brosur
                            </button>
                        </p>
                        <div class="agenda">
                            <h2 class="agenda-news" style="color:#3f3a64;">Alur Pendaftran Siswa Baru</h2>
                        </div>
                        <ol>
                            <li>
                                <p class="isi-sambutan">
                                    Lakukan registrasi/pendaftaran pada halaman website MA AL-IHSAN dengan cara klick link
                                    berikut :
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary-outlane p-0 btn-daftar"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Pendaftaran & Registrasi
                                    </button>
                                </p>
                            </li>
                            <li>
                                <p class="isi-sambutan">
                                    Lengkapi semua data dan berkas yang dibutuhkan dan kirim dengn menekan tombol kirim pada
                                    form pendaftaran.
                                </p>
                            </li>
                            <li>
                                <p class="isi-sambutan">
                                    Setelah melakukan pendaftaran, silhkan
                                    <a href="/login" class="btn-daftar">Login</a>
                                    pada website MA AL-IHSAN dengan memasukkan email dan password,
                                    untuk mengakses halaman dasboard siswa.
                                </p>
                            </li>
                            <li>
                                <p class="isi-sambutan">
                                    Mengikuti tes penerimaan siswa baru, pada waktu yng sudah ditentukan.
                                    Jadwal tes dapat dilihat pada dashboard siswa.
                                </p>
                            </li>
                            <li>
                                <p class="isi-sambutan">
                                    Pengumuman hasil tes, dapat dilihat pada dashboard siswa.
                                </p>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-6">
                        <div class="agenda">
                            <h2 class="agenda-news" style="color:#3f3a64;">MULOK</h2>
                            <hr class="garis-news">
                        </div>
                        <h3 class="heading" style="color:#20ad96;"><b>Tahfidzul Quran</b></h3>
                        <p class="isi-sambutan">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nobis explicabo eius adipisci
                            dolorem maiores sunt dignissimos labore saepe eligendi molestiae odio quod earum incidunt
                            laudantium error delectus porro velit.
                        </p>
                        <h3 class="heading" style="color:#20ad96;"><b>Multimedia</b></h3>
                        <p class="isi-sambutan">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nobis explicabo eius adipisci
                            dolorem maiores sunt dignissimos labore saepe eligendi molestiae odio quod earum incidunt
                            laudantium error delectus porro velit.
                        </p>
                        <h3 class="heading" style="color:#20ad96;"><b>Otomotif</b></h3>
                        <p class="isi-sambutan">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nobis explicabo eius adipisci
                            dolorem maiores sunt dignissimos labore saepe eligendi molestiae odio quod earum incidunt
                            laudantium error delectus porro velit.
                        </p>
                        <h3 class="heading" style="color:#20ad96;"><b>Administrasi Perkantoran</b></h3>
                        <p class="isi-sambutan">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nobis explicabo eius adipisci
                            dolorem maiores sunt dignissimos labore saepe eligendi molestiae odio quod earum incidunt
                            laudantium error delectus porro velit.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="baner mb-4">
            <div class="container">
                <div class="card bg-card-daftar">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="heading text-white"><b>Kami Siap Membantu Anda</b></h3>
                            <p class="isi-sambutan text-white">
                                Apabila kamu memiliki kendala atau pertanyaan. Silakan hubungi kami atau dapat juga membaca
                                Petunjuk Pendaftaran terlebih dahulu
                            </p>
                        </div>
                        <div class="col-lg-6" style="align-content: center;">
                            <div class="btn-baru">
                                <a href="https://wa.me/6282119436806?text=Assalamualaikum,%0A%0Asaya%20ingin%20bertanya" target="_blank" class="btn btn-primary" style="background: transparent;">WhatsApp</a>
                                <a href="" class="btn btn-primary" style="background: transparent;">Petenjuk
                                    Pendaftaran</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="brosurModal" tabindex="-1" aria-labelledby="brosurModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="brosurModalLabel"><b>Brosur PPDB</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="/image/br.jpeg" height="530" class="img-doc" alt="" srcset="">
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pendaftaran Siswa Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-modal">
                    @if (empty($string))
                        <h3 class="heading" style="color:#3f3a64;"><b>Tidak ada pendaftran dibuka</b></h3>
                    @else
                        <div class="card shadow-sm mb-4" style="padding: 20px;">
                            <h3 class="heading" style="color:#3f3a64;"><b>Details Pendaftaran</b></h3>
                            <hr style="margin-top: 3px">
                            <div class="row">
                                <div class="col-lg-6 bungkus">
                                    <div class="kiri">
                                        <p class="isi-sambutan">
                                            Periode :
                                        </p>
                                        <p class="isi-sambutan">
                                            Pendaftran :
                                        </p>
                                    </div>
                                    <div class="kanan" style="margin-left: auto;">
                                        <p class="isi-sambutan">
                                            {{ $string->periode }}
                                        </p>
                                        <p class="isi-sambutan">
                                            {{ $string->tanggal_mulai }} - {{ $string->tanggal_selesai }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 bungkus">
                                    <div class="kiri">
                                        <p class="isi-sambutan">
                                            Gelombang :
                                        </p>
                                        <p class="isi-sambutan">
                                            Biaya Pendaftaran :
                                        </p>
                                        <p class="isi-sambutan">
                                            Kuota :
                                        </p>
                                    </div>
                                    <div class="kanan" style="margin-left: auto;">
                                        <p class="isi-sambutan">
                                            {{ $string->gelombang }}
                                        </p>
                                        <p class="isi-sambutan">
                                            <b>Rp.{{ number_format($string->biaya) }}</b>
                                        </p>
                                        <p class="isi-sambutan">
                                            <b>{{ $kuota }} Pendaftar</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm" style="padding: 20px;">
                            <h3 class="heading" style="color:#3f3a64;"><b>Form Pendaftaran</b></h3>
                            <hr style="margin-top: 3px">
                            @if (!$formDitutup)
                                <form class="row g-3 form-floating" action="/prosesSiswaBaru" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="nama" class="form-label"><strong>Nama</strong></label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            value="{{ old('nama') }}" placeholder="Nama Peserta"
                                            oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nama" class="form-label"><strong>Gender</strong></label>
                                        <select name="gender" class="form-select">
                                            <option value="">-- Pilih --</option>
                                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="asal" class="form-label"><strong>Asal Sekolah</strong></label>
                                        <input type="text" name="asalSekolah" class="form-control" id="asalSekolah"
                                            value="{{ old('asalSekolah') }}" placeholder="Asal Sekolah Peserta"
                                            autocomplete="off" oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tlp" class="form-label"><strong>No.Tlp</strong></label>
                                        <input type="number" name="noTlp" value="{{ old('noTlp') }}"
                                            class="form-control" id="tlp"
                                            placeholder="Nomer Telefon Peserta/yang mewakilinya">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="exampleFormControlTextarea1"
                                            class="form-label"><strong>Alamat</strong></label>
                                        <textarea class="form-control" name="alamat" placeholder="Alamat lengkap peserta" id="exampleFormControlTextarea1"
                                            rows="3">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="username" class="form-label"><strong>Username</strong></label>
                                        <input type="text" name="username" value="{{ old('username') }}"
                                            class="form-control" id="tlp" placeholder="username">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="password" class="form-label"><strong>Password</strong></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="form-control" id="tlp" placeholder="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kk" class="form-label"><strong>Foto Kartu
                                                Keluarga</strong></label>
                                        <input type="file" class="form-control" name="kk"
                                            value="{{ old('kk') }}" id="inputCity">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kk" class="form-label"><strong>Foto Ijazah
                                                Terahir</strong></label>
                                        <input type="file" class="form-control" name="ijazahSmp"
                                            value="{{ old('ijazahSmp') }}" id="inputCity">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                <button type="button" class="btn btn-daftar p-0"
                                                    data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Syarat &
                                                    Ketentuan</button>
                                            </label>
                                        </div>
                                    </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            @else
                <div class="alert alert-danger mt-3">
                    <strong>Maaf!</strong> Kuota pendaftaran untuk gelombang ini sudah terpenuhi, tunggu pendaftaran
                    gelombang selanjutnya.
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                showCancelButton: true,
                confirmButtonText: "Login",
                cancelButtonText: "Nanti Saja"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
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
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Syarat & Ketentuan</h1>
                    <button type="button" class="btn-close" data-bs-target="#exampleModal" data-bs-toggle="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="agenda-news" style="color:#3f3a64;">Syarat & Ketentuan</h2>
                    <ol>
                        <li>
                            <p class="isi-sambutan">
                                Calon Murid baru Satuan Pendidikan MA AL-IHSAN
                                berusia palingtinggi 21 (dua puluh satu) tahun pada tanggal 1 Januari 2026
                                dengan dibuktikan akta kelahiran atau surat keterangan lahir yang dikeluarkan
                                oleh pihak yang berwenang dan dilegalisasi oleh lurah/kepala desa atau pihak yang
                                berwenang sesuai dengan domisili calon Murid baru;
                            </p>
                        </li>
                        <li>
                            <p class="isi-sambutan">
                                Calon Murid baru Satuan Pendidikan MA AL-IHSAN
                                telah menyelesaikan kelas 9 (sembilan) Satuan Pendidikan
                                SMP/MTs atau bentuk lain yang sederajat dibuktikan dengan
                                ijazah atau dokumen lain yang menyatakan kelulusan misalnya
                                surat keterangan lulus (SKL).
                            </p>
                        </li>
                        <li>
                            <p class="isi-sambutan">
                                Lulusan SMP atau bentuk lain yang sederajat sebelum tahun 2025, dengan ketentuan:
                            <ol type="a" style="padding-left: 20px;">
                                <li>Tidak sedang sekolah di Satuan Pendidikan SMA/SMK atau bentuk lain yang sederajat.</li>
                                <li>Tidak tercatat sebagai murid aktif di Dapodik atau Emis, dibuktikan dengan surat
                                    pernyataan orang tua/wali dari calon murid baru.</li>
                            </ol>
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Script Select2 -->
    <script>
        $("#asalSekolah").autocomplete({
            appendTo: "#exampleModal", // ganti dengan ID modal kamu
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.sekolah') }}",
                    dataType: "json",
                    data: {
                        q: request.term
                    },
                    success: function(data) {
                        response($.map(data.results, function(item) {
                            return item.text;
                        }));
                    }
                });
            },
            minLength: 1
        });
    </script>
@endsection
