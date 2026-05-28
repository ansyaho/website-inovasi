<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psb;
use App\Models\SiswaBaru;
use App\Models\Siswa;
use App\Models\Kelas;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaBaruExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\SiswaExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        // Ambil tahun aktif
        $tahunAktif = DB::table('psbs')
            ->where('is_active', true)
            ->value('periode');

        // Jumlah siswa berdasarkan tahun aktif
        $jumlahSiswa = DB::table('siswabarus')
            ->join('psbs', 'siswabarus.psb_id', '=', 'psbs.id')
            ->where('psbs.is_active', true)
            ->count();

        // Data gender berdasarkan gelombang & tahun aktif
        $datag = DB::table('siswabarus')
            ->join('psbs', 'siswabarus.psb_id', '=', 'psbs.id')
            ->where('psbs.is_active', true)
            ->selectRaw('
            psbs.gelombang,
            SUM(CASE WHEN gender = "L" THEN 1 ELSE 0 END) as laki,
            SUM(CASE WHEN gender = "P" THEN 1 ELSE 0 END) as perempuan
        ')
            ->groupBy('psbs.gelombang')
            ->orderBy('psbs.id')
            ->get();

        // Asal sekolah berdasarkan tahun aktif
        $asalSekolah = DB::table('siswabarus')
            ->join('psbs', 'siswabarus.psb_id', '=', 'psbs.id')
            ->where('psbs.is_active', true)
            ->select('asalSekolah', DB::raw('COUNT(*) as total'))
            ->groupBy('asalSekolah')
            ->orderBy('total', 'desc')
            ->get();

        $jmlsiswa = SiswaBaru::where('status', 'siswa')->count();

        return view('admin.main.index', [
            'data' => $jumlahSiswa,
            'gender' => $datag,
            'asalSekolah' => $asalSekolah,
            'tahunAktif' => $tahunAktif,
            'siswa' => $jmlsiswa
        ]);
    }

    public function psb()
    {
        $tahunAktif = Psb::where('is_active', true)
            ->value('periode');

        $data = Psb::where('periode', $tahunAktif)
            ->latest()
            ->get();

        return view('admin.psb.index', [
            'data' => $data,
            'tahunAktif' => $tahunAktif
        ]);
    }

    public function psbProses(Request $request)
    {
        $request->validate([
            'periode' => 'required',
            'gelombang' => 'required|in:Gelombang 1,Gelombang 2,Susulan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'kuota' => 'required|numeric',
            'biaya' => 'required|numeric'
        ]);

        // 🔹 Cek apakah gelombang sudah ada di periode yang sama
        $cekGelombang = Psb::where('periode', $request->periode)
            ->where('gelombang', $request->gelombang)
            ->exists();

        if ($cekGelombang) {
            return back()->withErrors([
                'gelombang' => 'Gelombang ini sudah ada pada periode tersebut'
            ])->withInput();
        }

        // 🔹 Ambil gelombang terakhir dalam periode yang sama
        $gelombangTerakhir = Psb::where('periode', $request->periode)
            ->orderBy('tanggal_selesai', 'desc')
            ->first();

        if ($gelombangTerakhir) {
            if ($request->tanggal_mulai <= $gelombangTerakhir->tanggal_selesai) {
                return back()->withErrors([
                    'tanggal_mulai' => 'Gelombang berikutnya harus setelah tanggal selesai gelombang sebelumnya'
                ])->withInput();
            }
        }

        // 🔥 CEK STATUS PERIODE
        // Apakah periode ini sudah ada dan sedang aktif?
        $isPeriodeActive = Psb::where('periode', $request->periode)
            ->where('is_active', true)
            ->exists();

        // Apakah ini periode baru (belum pernah ada)?
        $isFirstPeriode = !Psb::where('periode', $request->periode)->exists();

        $data = new Psb;
        $data->periode = $request->periode;
        $data->gelombang = $request->gelombang;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->kuota = $request->kuota;
        $data->biaya = $request->biaya;

        // 🔹 Logika aktivasi
        if ($isFirstPeriode || $isPeriodeActive) {
            $data->is_active = true;
        } else {
            $data->is_active = false;
        }

        $data->save();

        return back()->with('success', 'Gelombang berhasil ditambahkan');
    }


    public function psbProsesEdit(Request $request, $id)
    {
        $data = Psb::where('id', $id)->first();
        $berhasil = $request->validate([
            'periode' => 'required',
            'gelombang' => 'required|in:Gelombang 1,Gelombang 2,Susulan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'kuota' => 'required',
            'biaya' => 'required'
        ], [
            'periode.required' => 'periode tidakboleh kosong',
            'gelombang.required' => 'Gelombang tidakboleh kosong',
            'gelombang.in' => 'Gelombang tidak tersedia',
            'tanggal_mulai.required' => 'Tanggal mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Tanggal selesai tidak boleh kosong',
            'kuota.required' => 'Kuota tidak boleh kosong',
            'biaya.required' => 'biaya tidak boleh kosong'
        ]);

        $data->periode = $berhasil['periode'];
        $data->gelombang = $berhasil['gelombang'];
        $data->tanggal_mulai = $berhasil['tanggal_mulai'];
        $data->tanggal_selesai = $berhasil['tanggal_selesai'];
        $data->kuota = $berhasil['kuota'];
        $data->biaya = $berhasil['biaya'];
        $data->update();

        return back()->with('success', 'Data berhasil diubah');
    }

    public function lihat(Request $request)
    {
        $id = $request->query('id');
        $gel = Psb::where('id', $id)->first();
        $totalSiswa = SiswaBaru::where('psb_id', $id)->count();
        $siswa = SiswaBaru::where('psb_id', $id)->get(); // 10 per halaman
        return view('admin.psb.lihat', [
            'siswa' => $siswa,
            'gel' => $gel,
            'totalSiswa' => $totalSiswa
        ]);
    }

    public function exportPdf($id)
    {
        $gel = Psb::findOrFail($id);
        $siswa = SiswaBaru::with('psb')->where('psb_id', $id)->get();

        $pdf = Pdf::loadView('admin.psb.pdf', compact('siswa', 'gel'));
        return $pdf->download('pendaftar_' . $gel->gelombang . '.pdf');
    }

    public function exportPdfSiswa($id)
    {
        $gel = Psb::findOrFail($id);
        $siswa = SiswaBaru::with('psb')->where('psb_id', $id)->get();
        $asal = DB::table('siswabarus')
            ->join('psbs', 'siswabarus.psb_id', '=', 'psbs.id')
            ->where('psbs.is_active', true)
            ->select('asalSekolah', DB::raw('COUNT(*) as total'))
            ->groupBy('asalSekolah')
            ->orderBy('total', 'desc')
            ->get();

        $pdf = Pdf::loadView('admin.psb.pdfSiswa', compact('siswa', 'gel', 'asal'));
        return $pdf->download('pendaftar_' . $gel->gelombang . '.pdf');
    }

    public function exportExcel($id)
    {
        return Excel::download(new UsersExport($id), 'pendaftar_' . $id . '.xlsx');
    }

    public function exportExcelSiswa($id)
    {
        return Excel::download(new SiswaExport($id), 'siswa_' . $id . '.xlsx');
    }

    public function update(Request $request, $id)
    {
        $siswa = SiswaBaru::findOrFail($id);

        // VALIDASI
        $request->validate([
            'nama' => 'required',
            'asalSekolah' => 'required',
            'noTlp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'kk' => 'nullable|image|mimes:jpg,jpeg,png',
            'ijazahSmp' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // UPDATE DATA TEXT
        $siswa->nama = strtoupper($request->nama);
        $siswa->asalSekolah = strtoupper($request->asalSekolah);
        $siswa->noTlp = $request->noTlp;
        $siswa->alamat = $request->alamat;
        $siswa->username = $request->username;

        // UPDATE FOTO KK
        if ($request->hasFile('kk')) {

            // hapus file lama jika ada
            if ($siswa->kk && Storage::disk('public')->exists($siswa->kk)) {
                Storage::disk('public')->delete($siswa->kk);
            }

            $pathKK = $request->file('kk')->store('kk_siswa_baru', 'public');
            $siswa->kk = $pathKK;
        }

        // UPDATE FOTO IJAZAH
        if ($request->hasFile('ijazahSmp')) {

            if ($siswa->ijazahSmp && Storage::disk('public')->exists($siswa->ijazahSmp)) {
                Storage::disk('public')->delete($siswa->ijazahSmp);
            }

            $pathIjazah = $request->file('ijazahSmp')->store('ijazah_siswa_baru', 'public');
            $siswa->ijazahSmp = $pathIjazah;
        }

        $siswa->save();

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function tahunAjaran()
    {
        $tahun = DB::table('psbs')
            ->select('periode', DB::raw('MAX(is_active) as is_active'))
            ->groupBy('periode')
            ->orderBy('periode', 'desc')
            ->get();

        return view('admin.tahun.index', compact('tahun'));
    }

    public function aktifkanTahun($tahun)
    {
        // Nonaktifkan semua
        DB::table('psbs')->update(['is_active' => false]);

        // Aktifkan tahun yang dipilih
        DB::table('psbs')
            ->where('periode', $tahun)
            ->update(['is_active' => true]);

        return redirect()->back()
            ->with('success', 'Tahun ajaran berhasil diaktifkan');
    }

    public function dataSiswa(Request $request)
    {
        // Ambil periode aktif
        $periodeAktif = Psb::where('is_active', true)
            ->select('periode')
            ->distinct()
            ->first();

        if (!$periodeAktif) {
            return view('admin.psb.siswaBaru.index', [
                'gelombangs' => collect(),
                'siswas' => collect(),
                'periode' => null
            ]);
        }

        // Ambil semua gelombang di periode aktif
        $gelombangs = Psb::where('periode', $periodeAktif->periode)
            ->get();

        // Ambil gelombang yang dipilih
        $gelombangId = $request->gelombang;

        $siswas = SiswaBaru::query()
            ->when($gelombangId, function ($query) use ($gelombangId) {
                $query->where('psb_id', $gelombangId);
            })
            ->latest()
            ->get();

        $gel = Psb::where('periode', $periodeAktif->periode)->first();

        return view('admin.psb.siswaBaru.index', [
            'gelombangs' => $gelombangs,
            'siswas' => $siswas,
            'gel' => $gel,
            'periode' => $periodeAktif->periode,
            'gelombangId' => $gelombangId
        ]);
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:siswaBarus,id',
            'status' => 'required'
        ]);

        $siswa = SiswaBaru::find($request->id);
        $siswa->status = $request->status;
        $siswa->save();

        $kelas = Kelas::where('nama', 'X')->first();

        if ($siswa->status == 'siswa') {
            $data = new Siswa;
            $data->kelas_id = $kelas->id;
            $data->nama = $siswa->nama;
            $data->save();
        }

        return response()->json([
            'success' => true
        ]);
    }
}
