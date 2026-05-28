@extends('admin.main.layout')
@section('title')
    PPDB
@endsection
@section('kontenAdmin')
    <main class="pc-container">
        <section>
            <div class="container pc-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a href="{{ route('admin.psb.export.pdf', ['id' => $gel->id]) }}" class="btn btn-danger me-2">
                            <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                        </a>
                        <a href="{{ route('admin.psb.export.excel', ['id' => $gel->id]) }}" class="btn btn-success">
                            <i class="bi bi-file-earmark-excel-fill"></i> Excel
                        </a>
                    </div>
                </div>
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
                <h2 class="agenda-news mt-4" style="color:#3f3a64;">Data Pendaftar <b>{{ $gel->gelombang }}</b> Periode
                    <b>{{ $gel->periode }}</b>
                    ({{ $gel->tanggal_mulai }} - {{ $gel->tanggal_selesai }})</h2>
                <p class="text-muted">Total Pendaftar Pada Gelombang ini: {{ $totalSiswa }} Pendaftar</p>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="siswaTable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>No. Tlp</th>
                                <th>Alamat</th>
                                <th>Tgl Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody id="siswaBody">
                            @foreach ($siswa as $index => $s)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->asalSekolah }}</td>
                                    <td>{{ $s->noTlp }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($s->updated_at)->format('d/m/Y') }}
                                    </td>
                                    <td>{{ $s->status }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-pass" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit" data-id="{{ $s->id }}"
                                        data-nama="{{ $s->nama }}" data-asal="{{ $s->asalSekolah }}"
                                        data-tlp="{{ $s->noTlp }}" data-alamat="{{ $s->alamat }}"
                                        data-username="{{ $s->username }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


            </div>
        </section>
    </main>

    {{-- MODAL (HANYA 1) --}}
    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" id="formEdit">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Siswa</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body row g-2">
                        <div class="col-md-4">
                            <label>Nama</label>
                            <input type="text" name="nama" id="editNama" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asalSekolah" id="editAsal" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>No. Tlp</label>
                            <input type="number" name="noTlp" id="editTlp" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Alamat</label>
                            <textarea name="alamat" id="editAlamat" class="form-control"></textarea>
                        </div>

                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" name="username" id="editUsername" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" name="password" id="editPassword" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
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
        // Reusable Modal
            $('.btn-pass').on('click', function() {
                let btn = $(this);

                $('#editNama').val(btn.data('nama'));
                $('#editAsal').val(btn.data('asal'));
                $('#editTlp').val(btn.data('tlp'));
                $('#editAlamat').val(btn.data('alamat'));
                $('#editUsername').val(btn.data('username'));
                $('#editPassword').val(btn.data('password'));

                $('#formEdit').attr('action', `/siswa/${btn.data('id')}`);
            });
    </script>
@endsection
