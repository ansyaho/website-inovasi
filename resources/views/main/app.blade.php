<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')MA AL-IHSAN | Kalijaring</title>
    <link rel="icon" href="/image/icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .wa-container {
            position: fixed;
            bottom: 50px;
            right: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1054;
        }

        .wa-text {
            background: #f1f1f1;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            font-family: Arial, sans-serif;
        }

        .wa-button {
            background-color: #DCDCDC;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-decoration: none;
            transition: 0.3s;
        }

        .wa-button:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- header -->
    <header>
        @include('main.nav')
    </header>

    @yield('konten')

    <!-- footer -->
    <footer class="footer">
        @include('main.footer')
    </footer>

    <!-- scrool up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bi bi-arrow-up scrollup__icon"></i>
    </a>

    <!-- WhtsApp -->
    <!-- WhatsApp Floating Button -->
    <div class="wa-container">
        <div class="wa-text">Mau bertanya sesuatu ?</div>
        <a href="https://wa.me/6282119436806?text=Assalamualaikum,%0A%0a%20saya%20ingin%20bertanya" target="_blank" class="wa-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" width="30">
        </a>
    </div>

    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
