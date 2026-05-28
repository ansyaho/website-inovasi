@extends('admin.main.layout')
@section('title')
    Tahun Ajaran
@endsection
@section('kontenAdmin')
    <div class="pc-container">
        <div class="pc-content">
            <h4 class="mb-4">Manajemen Tahun Ajaran</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahun as $t)
                        <tr>
                            <td>{{ $t->periode }}</td>

                            <td>
                                @if ($t->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>

                            <td>
                                @if (!$t->is_active)
                                    <form action="{{ route('admin.tahun.aktifkan', $t->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">
                                            Aktifkan
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-success btn-sm" disabled>
                                        Sedang Aktif
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
