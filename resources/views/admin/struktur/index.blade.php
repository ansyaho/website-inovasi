@extends('admin.main.layout')
@section('title')
    Edit-Struktur
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="sambutan">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Edit Struktur Organisasi</b></h2>
                <p class="text-muted">Form Edit Struktur Organisasi</p>

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


                <form action="/simpan-struktur" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-center col-md-6">
                        <img id="preview"
                            src="{{ $data && $data->gambar
                                ? asset('storage/' . $data->gambar)
                                : 'https://via.placeholder.com/400x280?text=Preview+Foto' }}"
                            alt="Preview Foto" class="img-fluid"
                            style="
                        border-radius: 8px;
                        border: 2px dashed #ced4da;
                    ">


                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pilih Foto Struktur</strong></label>
                        <input type="file" class="form-control file-input" name="gambar" accept="image/*"
                            onchange="previewImage(event)" required>
                        <small class="text-muted">Format: JPG, PNG. Maks 2MB</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-list-check"></i> Struktur
                        </label>
                        <small class="text-muted d-block mb-2">
                            Pisahkan setiap keterangan dengan baris baru
                        </small>

                        <textarea name="keterangan" id="editor" class="form-control @error('keterangan') is-invalid @enderror" rows="6"
                            placeholder="1. Kepala Sekolah&#10;2. Wakil 1&#10;3. Wakil 2" required>{{ old('keterangan', $data->keterangan ?? '') }}</textarea>

                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end ">
                        <button type="submit" class="btn btn-success px-4 mb-4">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                </form>

            </div>
        </section>
    </main>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('editor', {
            height: 300,
            removeButtons: 'Image',
            language: 'id'
        });
    </script>

@endsection
