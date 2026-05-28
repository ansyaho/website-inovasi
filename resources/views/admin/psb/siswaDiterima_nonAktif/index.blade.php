@extends('admin.main.layout')
@section('title','Data Siswa')

@section('kontenAdmin')

<div class="pc-container">
<div class="pc-content">

<h3>Data Siswa</h3>

{{-- FILTER --}}
<form method="GET" class="row mb-3">
    <div class="col-md-3">
    <select name="kelas_id" class="form-control">
        <option value="">-- Semua Kelas --</option>
        @foreach($kelas as $k)
            <option value="{{ $k->id }}">
                {{ $k->nama }}
                @if($k->jurusan)
                    - {{ $k->jurusan->nama }}
                @endif
            </option>
        @endforeach
    </select>
</div>

    <div class="col-md-2">
        <button class="btn btn-primary">Filter</button>
    </div>
</form>

{{-- TABEL --}}
<form action="{{ route('admin.siswa.naikKelas') }}" method="POST">
@csrf

<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkAll"></th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswas as $siswa)
        <tr>
            <td>
                <input type="checkbox" name="siswa_ids[]" value="{{ $siswa->id }}">
            </td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas->nama }}</td>
            <td>{{ $siswa->kelas->jurusan?->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-success">Naik Kelas</button>
</form>

</div>
</div>
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: '{{ session('error') }}',
});
</script>
@endif
<script>
document.getElementById('checkAll').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name="siswa_ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

@endsection
