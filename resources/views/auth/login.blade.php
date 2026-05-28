<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login MA Al-IHSAN</title>
    <link rel="icon" href="/image/icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>

    <!-- header -->
    <main>
        <section class="login">
            <div class="bg-login"></div>
            <div class="container login-container">
                <div class="card login-card" style="width: 18rem">
                    <div class="container">
                        <img src="\image\icon.png" class="logo-login" alt="">
                        <h4 class="login-judul mt-4"><b>Masuk dan Verifikasi</b></h4>
                        <p class="des-login">Nikmati kemudahan sistem autentikasi
                            tunggal untuk mengakses semua layanan dengan satu akun.
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $item)
                                    <h2 style="font-size: 15px;">{{ $item }}</h2>
                                @endforeach
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('login.proses') }}" method="post">
                            @csrf
                            <input type="text" value="{{ old('login') }}" name="login" id=""
                                placeholder="Email / Username">
                            <input type="password" name="password" id="" placeholder="Masukkan Password">
                            <a href="#" id="lupa"
                                style="color: #0058a8; justify-self: end; font-size:14px;"><b>Lupa Kata
                                    Sandi ?</b></a>
                            <button type="submit" class="btn btn-primary btn-login">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        const blockedBtn2 = document.getElementById("lupa");

        if (blockedBtn2) {
            blockedBtn2.addEventListener("click", function() {

                Swal.fire({
                    icon: 'info',
                    title: 'Informasi',
                    text: 'Silahkan hubungi operator untuk merubah sandi',
                    showCancelButton: true,
                    confirmButtonText: "Hubungi Admin",
                    cancelButtonText: "Nanti Saja"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open("https://wa.me/6282119436806?text=Assalamualaikum,%0A%0Asaya%20ingin%20bertanya", "_blank");
                    }
                });

            });
        }
    </script>
</body>

</html>
