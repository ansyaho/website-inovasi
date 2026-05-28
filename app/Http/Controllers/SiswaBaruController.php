<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psb;
use App\Models\SiswaBaru;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SiswaBaruController extends Controller
{
    public function pendaftaranSiswaBaru()
    {
        $cek = Carbon::today()->format('Y-m-d');
        $data = Psb::whereDate('tanggal_mulai', '<=', $cek)->whereDate('tanggal_selesai', '>=', $cek)->first();
        if (empty($data)) {
            $data = "";
        }
        $formDitutup = true;
        if ($data) {

            $jumlahPendaftar = SiswaBaru::where('psb_id', $data->id)->count();

            if ($jumlahPendaftar < $data->kuota) {
                $formDitutup = false; // masih ada kuota
            }
        }
        return view('siswa.baru', [
            'string' => $data,
            'kuota' => $data ? $data->kuota : 0,
            'formDitutup' => $formDitutup
        ]);
    }

    public function prosesSiswaBaru(Request $request)
    {
        // 1. Buat Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gender' => 'required',
            'asalSekolah' => 'required',
            'noTlp' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:siswabarus,username',
            'password' => 'required',
            'kk' => 'required|image',
            'ijazahSmp' => 'required|image'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'asalSekolah.required' => 'Asal sekolah tidak boleh kosong',
            'noTlp.required' => 'No.Tlp tidak boleh kosong',
            'kk.required' => 'Foto KK tidak boleh kosong',
            'kk.image' => 'Foto KK harus berformat gambar',
            'ijazahSmp.required' => 'Ijazah SMP tidak boleh kosong',
        ]);

        // 2. Cek jika validasi gagal
        if ($validator->fails()) {
            return back()
                ->withErrors($validator) // Kirim error asli ke Blade
                ->withInput()
                ->with('error', '<strong>' . $validator->errors()->first() . '</strong>');
        }

        // 3. Ambil data yang sudah divalidasi (ini jadi ARRAY)
        $safeData = $validator->validated();

        // 4. Cek duplikasi data
        $cek = SiswaBaru::where('nama', $safeData['nama'])
            ->where('username', $safeData['username'])
            ->where('noTlp', $safeData['noTlp'])
            ->first();

        if ($cek) {
            return back()->withInput()->with('error', 'Data sudah terdaftar sebelumnya.');
        }

        // 5. Proses Upload File
        if ($request->hasFile('kk')) {
            $pathKK = $request->file('kk')->store('kk_siswa_baru', 'public');
        } else {
            $pathKK = null;
        }

        if ($request->hasFile('ijazahSmp')) {
            $pathIjazah = $request->file('ijazahSmp')->store('ijazahSmp_siswa_baru', 'public');
        } else {
            $pathIjazah = null;
        }


        $psbAktif = Psb::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->first();
        if (!$psbAktif) {
            return back()->with('error', 'Pendaftaran belum dibuka atau sudah ditutup.');
        }

        // 6. Simpan Data
        $data = new SiswaBaru;
        $data->psb_id = $psbAktif['id'];
        $data->nama = $safeData['nama'];
        $data->gender = $safeData['gender'];
        $data->username = $safeData['username'];
        $data->password = bcrypt($safeData['password']); // Keamanan: wajib bcrypt
        $data->asalSekolah = $safeData['asalSekolah'];
        $data->noTlp = $safeData['noTlp'];
        $data->alamat = $safeData['alamat'];
        $data->kk = $pathKK;
        $data->ijazahSmp = $pathIjazah;
        $data->status = 'Proses';
        $data->skor = 0;
        $data->save();

        return redirect()->back()->with('success', 'Selamat! Pendaftaran berhasil dilakukan. Silahkan melakukan login untuk mengakses akun peserta dan melakukan ujian tes masuk.');
    }

    public function searchSekolah(Request $request)
    {
        $search = $request->q;

        $data = SiswaBaru::whereRaw('UPPER(asalSekolah) LIKE ?', ['%' . strtoupper($search) . '%'])
            ->select('asalSekolah')
            ->distinct()
            ->limit(10)
            ->get();


        $results = [];

        foreach ($data as $item) {
            $results[] = [
                'id' => $item->asalSekolah,
                'text' => $item->asalSekolah
            ];
        }

        return response()->json([
            'results' => $results
        ]);
    }

    public function akun()
    {
        return view('siswa.akun.main.index');
    }
    public function update(Request $request)
    {
        /** @var \App\Models\Siswa $user */
        $user = auth('siswa')->user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:siswabarus,username,' . $user->id,
            'asalSekolah' => 'required|string|max:255',
            'noTlp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png',
            'kk' => 'nullable|image|mimes:jpg,jpeg,png',
            'ijazahSmp' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // ======================
        // UPDATE DATA TEXT
        // ======================

        $user->nama = strtoupper($request->nama);
        $user->username = $request->username;
        $user->asalSekolah = strtoupper($request->asalSekolah);
        $user->noTlp = $request->noTlp;
        $user->alamat = $request->alamat;

        // ======================
        // UPDATE FOTO PROFILE
        // ======================

        if ($request->hasFile('foto')) {

            if ($user->foto && Storage::disk('public')->exists('profile/' . $user->foto)) {
                Storage::disk('public')->delete('profile/' . $user->foto);
            }

            $fotoPath = $request->file('foto')->store('profile', 'public');
            $user->foto = basename($fotoPath);
        }

        // ======================
        // UPDATE KK
        // ======================

        if ($request->hasFile('kk')) {

            if ($user->kk && Storage::disk('public')->exists($user->kk)) {
                Storage::disk('public')->delete($user->kk);
            }

            $kkPath = $request->file('kk')->store('kk_siswa_baru', 'public');
            $user->kk = $kkPath;
        }

        // ======================
        // UPDATE IJAZAH
        // ======================

        if ($request->hasFile('ijazahSmp')) {

            if ($user->ijazahSmp && Storage::disk('public')->exists($user->ijazahSmp)) {
                Storage::disk('public')->delete($user->ijazahSmp);
            }

            $ijazahPath = $request->file('ijazahSmp')->store('ijazahSmp_siswa_baru', 'public');
            $user->ijazahSmp = $ijazahPath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function submit(Request $request)
    {
        $kunciJawaban = [
            "5",
            "Syahadat",
            "Sholat",
            "Ramadhan",
            "Mampu",
            "Mekkah",
            "Pertama",
            "5 kali",
            "Kedua",
            "Fisik dan finansial"
        ];

        $jawabanUser = $request->jawaban;
        $skor = 0;

        foreach ($kunciJawaban as $i => $kunci) {
            if (isset($jawabanUser[$i]) && $jawabanUser[$i] == $kunci) {
                $skor += 10;
            }
        }
        if ($skor >= 70) {
            /** @var \App\Models\Siswa $siswa */
            $siswa = auth('siswa')->user();
            $siswa->skor = $skor;
            $siswa->status = 'selesai';
            $siswa->save();

            return redirect()->back()->with('success', 'Selamat ' . auth('siswa')->user()->nama . ' dinyatakan lulus. Segera melakukan daftar ulang ke kantor MA AL-IHSAN.');
        } else {
            return redirect()->back()->with('error', 'Maaf ' . auth('siswa')->user()->nama . ' Skor anda masih belum memenuhi, silahkan kerjakan kembali soal tes yang disediakan.');
        }
    }
}
