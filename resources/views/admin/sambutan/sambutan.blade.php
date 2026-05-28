@extends('admin.main.layout')
@section('title')
    Edit-Sambutan
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="sambutan">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Edit Sambutan Kepala Sekolah</b></h2>
                <p class="text-muted">Form Edit Sambutan Kepala Sekolah</p>

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


                <form action="/simpan-sambutan" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 text-center col-md-6">
                        @if (!empty($data->foto))
                            <img id="preview"
                                src="{{ $data->foto
                                    ? asset('storage/' . $data->foto)
                                    : 'https://events.rumah123.com/wp-content/uploads/sites/41/2023/09/12160753/gambar-foto-profil-whatsapp-kosong-300x300.jpg' }}"
                                alt="Preview Foto" class="img-fluid"
                                style="
                        border-radius: 8px;
                        border: 2px dashed #ced4da;
                    ">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pilih Foto</strong></label>
                        <input type="file" class="form-control file-input" name="foto" accept="image/*"
                            onchange="previewImage(event)" required>
                        <small class="text-muted">Format: JPG, PNG. Maks 2MB</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Isi Paragraf</strong></label>
                        <small class="text-muted">(Enter untu membuat paragraf baru)</small>
                        <textarea id="editor" name="isi" class="form-control" rows="6" required>
                        @if (!empty($data->isi))
{{ old('isi', $data->isi) }}
@endif
                    </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
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
