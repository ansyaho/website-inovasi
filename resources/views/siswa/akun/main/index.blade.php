@extends('siswa.akun.main.layout')
@section('title')
    Home
@endsection
@section('kontenSiswa')
    <!-- [ Main Content ] start -->
    <div class="pc-container" style="top:99px">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-8 col-md-12">
                    <div class="card bg-primary-dark tg dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            @if (auth('siswa')->user()->status == 'selesai')
                                <h2 class="text-white"><b>Hai' {{ auth('siswa')->user()->nama }}</b> Selamat ya kamu sudah
                                    berhasil <b>LOLOS</b> tes awal.</h2><br>
                                <p>Segera lakukan daftar ulang ke bagian Administrasi MA AL-IHSAN.</p><br>
                                <p>Berkas yang perlu dibawa:</p><br>
                                <p>1. Fotocopy Ijazah SMP. <br>
                                    2. Fotocopy Akta Kelahiran. <br>
                                    3. Fotocopy Karti Keluarga.</p> <br>
                                <p>Sekali lagi Selamat ya {{ auth('siswa')->user()->nama }}, aku tunggu di MA AL-IHSAN.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card bg-card">
                        <div class="card-body">


                            <div class="col-md-12 text-center">
                                <div class="profile-wrapper">
                                    <img id=""
                                        src="{{ auth()->user()->foto ? asset('storage/profile/' . auth()->user()->foto) : asset('image/default.jpg') }}"
                                        class="profile-img">
                                </div>
                            </div>

                            <p class="mt-4 mb-0 text-black"><b>Nama : {{ auth('siswa')->user()->nama }} </b></p><br>
                            <p class="text-black mb-0"><b>Asal Sekolah : {{ auth('siswa')->user()->asalSekolah }}</b></p>
                            <br>
                            <p class="text-black mb-0"><b>Alamat : {{ auth('siswa')->user()->alamat }} </b></p><br>
                            <p class="text-black mb-0"><b>No.Tlp : {{ auth('siswa')->user()->noTlp }}</b></p> <br>
                            <br>
                            <hr style="color:black;">
                            <p class="text-black">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Facilis dicta ut suscipit eaque itaque laudantium
                                alias magnam vero! Nulla quis totam veritatis explicabo eum nesciunt
                                itaque quos culpa recusandae iure?</p>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    @if (auth('siswa')->user()->status == 'Proses')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('ujianModal'));
                myModal.show();
            });
        </script>
    @endif
    <div class="modal fade" id="ujianModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('ujian.submit') }}" method="POST">
                    @csrf

                    <div class="modal-header text-white" style="background-color: #51BE8C">
                        <img src="/image/icon.png" alt="user-image" width="40"
                            style="background-color: #FFFFFF; border-radius: 50%; padding:5px;" />
                        <h5 class="modal-title text-white ms-2">Tes Ujian Masuk MA AL-IHSAN</h5>
                    </div>

                    <div class="modal-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <p style="color: red;">
                            <b>Petunjuk Pengerjaan:</b> <br>
                            1. Kerjakan dengan sungguh-sungguh. <br>
                            2. Tidak ada batas waktu pengerjaan. <br>
                            3. Jangan menutup atau merifresh halaman ketika tes berlangsung.
                        </p>
                        <hr>
                        @php
                            $soal = [
                                [
                                    'pertanyaan' => 'Rukun Islam ada berapa?',
                                    'opsi' => ['3', '4', '5'],
                                ],
                                [
                                    'pertanyaan' => 'Rukun Islam pertama adalah?',
                                    'opsi' => ['Sholat', 'Syahadat', 'Zakat'],
                                ],
                                [
                                    'pertanyaan' => 'Rukun Islam kedua adalah?',
                                    'opsi' => ['Sholat', 'Puasa', 'Haji'],
                                ],
                                [
                                    'pertanyaan' => 'Puasa dilakukan pada bulan?',
                                    'opsi' => ['Ramadhan', 'Syawal', 'Muharram'],
                                ],
                                [
                                    'pertanyaan' => 'Zakat wajib bagi yang?',
                                    'opsi' => ['Mampu', 'Anak kecil', 'Musafir'],
                                ],
                                [
                                    'pertanyaan' => 'Haji dilaksanakan di kota?',
                                    'opsi' => ['Mekkah', 'Surabaya', 'Jakarta'],
                                ],
                                [
                                    'pertanyaan' => 'Syahadat adalah rukun Islam ke?',
                                    'opsi' => ['Pertama', 'Ketiga', 'Kelima'],
                                ],
                                [
                                    'pertanyaan' => 'Sholat wajib sehari berapa kali?',
                                    'opsi' => ['3 kali', '5 kali', '7 kali'],
                                ],
                                [
                                    'pertanyaan' => 'Sholat termasuk rukun Islam ke?',
                                    'opsi' => ['Kelima', 'Ketiga', 'Kedua'],
                                ],
                                [
                                    'pertanyaan' => 'Haji wajib bagi yang mampu secara?',
                                    'opsi' => ['Fisik dan finansial', 'Usia saja', 'Teman banyak'],
                                ],
                            ];
                        @endphp

                        @foreach ($soal as $index => $s)
                            <div class="mb-3">
                                <strong>{{ $index + 1 }}. {{ $s['pertanyaan'] }}</strong>

                                @foreach ($s['opsi'] as $key => $opsi)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban[{{ $index }}]"
                                            value="{{ $opsi }}" required>
                                        <label class="form-check-label">
                                            {{ $opsi }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Selamat!",
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif
@endsection
