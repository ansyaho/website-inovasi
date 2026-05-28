@extends('admin.main.layout')
@section('title')
    Edit-Sejarah
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="sambutan">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Edit Sejarah Sekolah</b></h2>
                <p class="text-muted">Form Edit Sejarah Sekolah</p>

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


                <form action="/simpan-sejarah" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-eye"></i> Sejarah
                        </label>
                        <small class="text-muted">(Enter untu membuat paragraf baru)</small>
                        <textarea id="editor" name="sejarah" class="form-control @error('visi') is-invalid @enderror" rows="8"
                            placeholder="Masukkan Sejarah sekolah..." required>{{ old('sejarah', $data->sejarah ?? '') }}</textarea>

                        @error('sejarah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end ">
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
