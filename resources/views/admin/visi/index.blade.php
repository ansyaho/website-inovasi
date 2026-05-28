@extends('admin.main.layout')
@section('title')
    Edit-Visi & Misi
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="sambutan">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Edit Visi & Misi Sekolah</b></h2>
                <p class="text-muted">Form Edit Visi & Misi Sekolah</p>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif


                <form action="/edit-visi" method="POST">
                    @csrf

                    {{-- VISI --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-eye"></i> Visi
                        </label>
                        <textarea name="visi" class="form-control @error('visi') is-invalid @enderror" rows="4"
                            required>{{ old('visi', $data->visi ?? '') }}</textarea>

                        @error('visi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- MISI --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-list-check"></i> Misi
                        </label>
                        <small class="text-muted d-block mb-2">
                            Pisahkan setiap misi dengan baris baru
                        </small>

                        <textarea name="misi" id="editor" class="form-control @error('misi') is-invalid @enderror" rows="6"
                            placeholder="1. Misi pertama&#10;2. Misi kedua&#10;3. Misi ketiga" required>{{ old('misi', $data->misi ?? '') }}</textarea>

                        @error('misi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-eni]kd ">
                        <button type="submit" class="btn btn-success px-4 mb-4">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </section>
    </main>

    <script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('editor', {
            height: 300,
            removeButtons: 'Image',
            language: 'id'
        });
    </script>

@endsection
