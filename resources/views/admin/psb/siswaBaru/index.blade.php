@extends('admin.main.layout')
@section('title', 'Siswa Baru')
@section('kontenAdmin')

    <div class="pc-container">
        <div class="pc-content">

            <h4>Periode Aktif: {{ $periode }}</h4>
            @if(!empty($gel))
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="ms-auto">
                    <a href="{{ route('admin.siswa.export.pdf', ['id' => $gel->id]) }}" class="btn btn-danger me-2">
                        <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                    </a>
                    <a href="{{ route('admin.siswa.export.excel', ['id' => $gel->id]) }}" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel-fill"></i> Excel
                    </a>
                </div>
            </div>
            @endif
            <form method="GET" class="mb-3">
                <div class="col-md-4">
                    <select name="gelombang" class="form-control" onchange="this.form.submit()">
                        <option value="">-- Pilih Gelombang --</option>
                        @foreach ($gelombangs as $g)
                            <option value="{{ $g->id }}" {{ $gelombangId == $g->id ? 'selected' : '' }}>
                                {{ $g->gelombang }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="siswaTable1">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>No. Tlp</th>
                            <th>Alamat</th>
                            <th>Tgl Daftar</th>
                            <th>Skor</th>
                            <th>Status</th>
                            <th>Validasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($siswas as $i => $siswa)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->asalSekolah }}</td>
                                <td>{{ $siswa->noTlp }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->updated_at->format('d/m/Y') }}</td>
                                <td>{{ $siswa->skor }}</td>

                                <td class="status-text" data-id="{{ $siswa->id }}">
                                    @if ($siswa->status === 'siswa')
                                        <span class="badge bg-success">Siswa</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input status-checkbox"
                                        data-id="{{ $siswa->id }}" {{ $siswa->status === 'siswa' ? 'checked' : '' }}>
                                </td>

                                <td>
                                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit" data-id="{{ $siswa->id }}"
                                        data-nama="{{ $siswa->nama }}" data-asal="{{ $siswa->asalSekolah }}"
                                        data-tlp="{{ $siswa->noTlp }}" data-alamat="{{ $siswa->alamat }}"
                                        data-username="{{ $siswa->username }}">
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

                        <div class="col-md-8">
                            <label>Alamat</label>
                            <textarea name="alamat" id="editAlamat" class="form-control"></textarea>
                        </div>

                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" name="username" id="editUsername" class="form-control">
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

    {{-- SCRIPTS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function() {

            // DataTables
            $('#siswaTable1').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                responsive: true,
                language: {
                    search: "Cari:",
                    zeroRecords: "Tidak ada data ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data"
                }
            });

            // Reusable Modal
            $('.btn-edit').on('click', function() {
                let btn = $(this);

                $('#editNama').val(btn.data('nama'));
                $('#editAsal').val(btn.data('asal'));
                $('#editTlp').val(btn.data('tlp'));
                $('#editAlamat').val(btn.data('alamat'));
                $('#editUsername').val(btn.data('username'));

                $('#formEdit').attr('action', `/siswa/${btn.data('id')}`);
            });

            // Update Status AJAX
            $('.status-checkbox').on('change', function() {
                let id = $(this).data('id');
                let status = this.checked ? 'siswa' : 'pending';

                fetch("{{ route('siswa.updateStatus') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            id,
                            status
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            const badge = status === 'siswa' ?
                                '<span class="badge bg-success">Siswa</span>' :
                                '<span class="badge bg-warning">Pending</span>';

                            document.querySelector(`.status-text[data-id="${id}"]`).innerHTML = badge;
                        }
                    });
            });

        });
    </script>

@endsection
