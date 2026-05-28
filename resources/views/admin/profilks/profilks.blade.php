@extends('admin.main.layout')
@section('title')
    Edit-Profil Kepala Sekolah
@endsection
@section('kontenAdmin')

    <main class="pc-container">
        <section class="sambutan">
            <div class="container pc-content">
                <h2 class="agenda-news mt-4" style="color:#3f3a64;"><b>Edit Profil Kepala Sekolah</b></h2>
                <p class="text-muted">Form Edit Profil Kepala Sekolah</p>

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
                <form action="/simpan-profilks" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="gap: 20px;">
                        <div class="col-lg-4">
                            <h2>Foto Profile</h2>
                            <div class="card p-2" style="box-shadow: 6px 6px 5px rgba(0, 0, 0, 0.27);">
                                <img id="preview"
                                    src="{{ $data && $data->fotoutama
                                        ? asset('storage/' . $data->fotoutama)
                                        : 'https://via.placeholder.com/400x280?text=Preview+Foto' }}"
                                    alt="Preview Foto" class="img-fluid"
                                    style="
                                    border-radius: 8px;
                                    border: 2px dashed #ced4da;
                            ">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Pilih Foto</strong></label>
                                <input type="file" class="form-control file-input" name="fotoutama" accept="image/*"
                                    onchange="previewImage(event)" required>
                                <small class="text-muted">Format: JPG, PNG. Maks 2MB</small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h2>Nama Lengkap</h2>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="nama" id="floatingInput" />
                                <label for="floatingInput">{{ $data->nama ?? '' }}</label>
                            </div>
                            <hr class="garis-sambutan" style="width:100%">
                            <h5 class="judul-kepala">Kepala Sekolah Madrasah Aliyah Al-Ihsan</h5>
                            <h2 class="judul-kepala mt-4" style="color:#20ad96;">Jadikan MA Al-Ihsan Berorientasi Global
                            </h2>
                            <h3>Profile Kepala Sekolah</h3>
                            <textarea name="keterangan1" id="" style="width:100%;" rows="10" placeholder="Tuliskan kata sambutan..">
                            {{ old('keterangan1', $data->keterangan1 ?? '') }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <h3>Judul Prestasi 1</h3>
                        <input type="text" class="form-control" name="judul1" id="floatingInput" required />
                        <label for="floatingInput">{{ $data->judul1 ?? '' }}</label>
                    </div>
                    <h3>Foto Prestasi 1</h3>
                    <div class="mb-3 text-center col-md-6">
                        <img id="preview1"
                            src="{{ $data && $data->foto1
                                ? asset('storage/' . $data->foto1)
                                : 'https://via.placeholder.com/400x280?text=Preview+Foto' }}"
                            alt="Preview Foto" class="img-fluid"
                            style="
                        border-radius: 8px;
                        border: 2px dashed #ced4da;
                    ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pilih Foto</strong></label>
                        <input type="file" class="form-control file-input" name="foto1" accept="image/*"
                            onchange="previewImage1(event)" required>
                        <small class="text-muted">Format: JPG, PNG. Maks 2MB</small>
                    </div>
                    <h3>Keterangan Prestasi 1</h3>
                    <textarea name="keterangan2" id="" style="width:100%;" rows="10" placeholder="Deskripsi..">
                    {{ old('keterangan1', $data->keterangan2 ?? '') }}
                </textarea>

                    <h3 class="mt-4">Judul Prestasi 2</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="judul2" id="floatingInput" />
                        <label for="floatingInput" required>{{ $data->judul2 ?? '' }}</label>
                    </div>
                    <h3>Foto Prestasi 2</h3>
                    <div class="mb-3 text-center col-md-6">
                        <img id="preview2"
                            src="{{ $data && $data->foto2
                                ? asset('storage/' . $data->foto2)
                                : 'https://via.placeholder.com/400x280?text=Preview+Foto' }}"
                            alt="Preview Foto" class="img-fluid"
                            style="
                        border-radius: 8px;
                        border: 2px dashed #ced4da;
                    ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pilih Foto</strong></label>
                        <input type="file" class="form-control file-input" name="foto2" accept="image/*"
                            onchange="previewImage2(event)" required>
                        <small class="text-muted">Format: JPG, PNG. Maks 2MB</small>
                    </div>
                    <h3>Keterangan Prestasi 2</h3>
                    <textarea name="keterangan3" id="" style="width:100%;" rows="10" placeholder="Deskripsi..">
                    {{ old('keterangan1', $data->keterangan3 ?? '') }}
                </textarea>
                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success px-4 mb-4">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
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
    <script>
        function previewImage1(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview1').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        function previewImage2(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview2').src = reader.result;
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
