<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pendaftar</title>
    <style>
        /* Mengatur font agar mirip */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container utama kop surat */
        .header-container {
            width: 100%;
            margin-bottom: 20px;
        }

        /* Tabel untuk membagi Logo dan Teks */
        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Kolom Logo */
        .logo-cell {
            width: 15%;
            /* Sesuaikan lebar kolom logo */
            vertical-align: middle;
            text-align: center;
        }

        .logo-img {
            width: 95px;
            /* Sesuaikan ukuran logo */
            height: auto;
        }

        /* Kolom Teks */
        .text-cell {
            width: 85%;
            text-align: center;
            vertical-align: top;
            padding-left: 10px;
        }

        /* Styling Teks Judul */
        .yayasan-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
        }

        .school-name {
            font-size: 24px;
            font-weight: 900;
            /* Lebih tebal */
            margin: 5px 0;
            text-transform: uppercase;
        }

        .meta-info {
            font-size: 12px;
            font-weight: bold;
            margin-top: 5px;
        }

        .meta-info span {
            margin: 0 10px;
            /* Jarak antar item (NSM, Akreditasi) */
        }

        /* Bagian Alamat (Kotak di bawah) */
        .address-box {
            border: 1px solid black;
            /* Kotak hitam */
            padding: 5px;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            margin-top: 5px;
            width: 100%;
            box-sizing: border-box;
            /* Agar padding tidak merusak lebar */
        }
    </style>
</head>

<body>
    <div class="header-container">
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ public_path('image/icon.png') }}" class="logo-img" alt="Logo">
                </td>

                <td class="text-cell">
                    <div class="yayasan-name">YAYASAN PENDIDIKAN DAN SOSIAL AL-IHSAN</div>
                    <div class="school-name">MADRASAH ALIYAH</div>
                    <div class="school-name">"AL-IHSAN"</div>

                    <div class="meta-info">
                        <span>TERAKREDITASI : B</span>
                        <span>NSM : 131235170059</span>
                    </div>

                    <div class="meta-info">
                        <span>Email : maalihsankalijaring@gmail.com</span>
                        <span>Website : maalihsanjbg.sch.id</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="address-box">
            Alamat: Jln. Anggrek No 22 Kalijaring Kalikejambon Tembelang Jombang 61452 Telp/Fax : (0321) 863825
        </div>
    </div>

    <hr>

    <div class="content">
        <table border="1" width="100%" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>No.Tlp</th>
                <th>Alamat</th>
                <th>Tgl Daftar</th>
                <th>Status</th>
            </tr>

            @foreach ($siswa as $item => $s)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->asalSekolah }}</td>
                    <td>{{ $s->noTlp }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($s->updated_at)->format('d-m-Y') }}
                    </td>
                    <td>{{ $s->status }}</td>

                </tr>
            @endforeach

        </table>
    </div>

</body>

</html>
