@extends('admin.main.layout')
@section('title')
    PPDB
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="psb">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Sistem Penerimaan Murid Baru</b></h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            <h2 style="font-size: 15px;">{{ $item }}</h2>
                        @endforeach
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Formulir PPDB
                </button>

                <table class="table table-striped table-sm" id="siswaTable"
                    style="background-color: white; border-radius: 5px;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Gelombang</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($data as $o)
                            <tr>
                                <td scope="row">{{ $no }}</td>
                                <td>{{ $o->periode }}</td>
                                <td>{{ $o->gelombang }}</td>
                                <td>
                                    <?php $hari = \Carbon\Carbon::today(); ?>
                                    @if ($hari->between($o->tanggal_mulai, $o->tanggal_selesai))
                                        <button type="button" class="btn btn-warning" style="padding: 0.25rem !important;"
                                            data-bs-toggle="modal" data-bs-target="#edit{{ $o->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    @endif
                                    <a href="/lihat?id={{ $o->id }}" class="btn btn-primary"
                                        style="padding: 0.25rem !important;"><i class="bi bi-eye-fill"></i></a>
                                    <div class="modal fade" id="edit{{ $o->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="/psbProsesEdit/{{ $o->id }}" method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput"
                                                                class="form-label"><strong>Periode</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $o->periode }}" name="periode"
                                                                id="formGroupExampleInput">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text"
                                                                for="inputGroupSelect01">Gelombang</label>
                                                            <select name="gelombang" class="form-select"
                                                                id="inputGroupSelect01">
                                                                <option value="{{ $o->gelombang }}" selected>
                                                                    {{ $o->gelombang }}
                                                                </option>
                                                                <option value="Gelombang 1">Gelombang 1</option>
                                                                <option value="Gelombang 2">Gelombang 2</option>
                                                                <option value="Susulan">Susulan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput"
                                                                class="form-label"><strong>Tanggal Mulai</strong></label>
                                                            <input type="date" value="{{ $o->tanggal_mulai }}"
                                                                class="form-control" name="tanggal_mulai"
                                                                id="formGroupExampleInput">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput"
                                                                class="form-label"><strong>Tanggal selesai</strong></label>
                                                            <input type="date" class="form-control"
                                                                value="{{ $o->tanggal_selesai }}" name="tanggal_selesai"
                                                                id="formGroupExampleInput">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput"
                                                                class="form-label"><strong>Kuota</strong></label>
                                                            <input type="number" class="form-control"
                                                                value="{{ $o->kuota }}" name="kuota"
                                                                id="formGroupExampleInput"
                                                                placeholder="Masukan kuota siswa baru">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formGroupExampleInput"
                                                                class="form-label"><strong>Biaya
                                                                    Pendaftaran</strong></label>
                                                            <input type="number" class="form-control"
                                                                value="{{ $o->biaya }}" name="biaya"
                                                                id="formGroupExampleInput">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pembukaan Pendaftaran Siswa Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/psbProses" method="post">
                        @csrf
                        <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::today() }}">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Periode</strong></label>
                            <input type="text" class="form-control" value="{{ old('periode') }}" name="periode"
                                id="formGroupExampleInput" placeholder="Contoh penulisan 2025-2026">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gelombang</label>
                            <select name="gelombang" class="form-select" id="inputGroupSelect01">
                                <option selected>Pilih Gelombang</option>
                                <option value="Gelombang 1">Gelombang 1</option>
                                <option value="Gelombang 2">Gelombang 2</option>
                                <option value="Susulan">Susulan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Tanggal Mulai</strong></label>
                            <input type="date" value="{{ old('tanggal_mulai') }}" class="form-control"
                                name="tanggal_mulai" id="formGroupExampleInput">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Tanggal selesai</strong></label>
                            <input type="date" class="form-control" value="{{ old('tanggal_selesai') }}"
                                name="tanggal_selesai" id="formGroupExampleInput">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Kuota</strong></label>
                            <input type="number" class="form-control" value="{{ old('kuota') }}" name="kuota"
                                id="formGroupExampleInput" placeholder="Masukan kuota siswa baru">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label"><strong>Biaya
                                    Pendaftaran</strong></label>
                            <input type="number" class="form-control" value="{{ old('biaya') }}" name="biaya"
                                id="formGroupExampleInput" placeholder="Contoh penulisan 100000">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#siswaTable').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                responsive: true,
                language: {
                    search: "Cari:",
                    zeroRecords: "Tidak ada data ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });
        });
    </script>
@endsection
