<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sambutan;
use App\Models\Sejarah;
use App\Models\Profilks;
use App\Models\Visi;
use App\Models\Struktur;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.sambutan.sambutan', [
            'data' => Sambutan::first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'isi'   => 'required'
        ]);

        $data = Sambutan::first();
        if (!$data) {
            $data = new Sambutan();
        }

        $changed = false;

        // Update judul & isi
        if ($data->isi !== $request->isi) {
            $data->isi   = $request->isi;
            $changed = true;
        }

        // Update foto jika ada upload baru
        if ($request->hasFile('foto')) {
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }

            $data->foto = $request->file('foto')->store('sambutan', 'public');
            $changed = true;
        }

        if ($changed) {
            $data->save();
            return back()->with('success', 'Data berhasil diperbarui');
        }

        return back()->with('info', 'Tidak ada perubahan data');
    }

    // VISI&MISI

    public function visi()
    {
        return view('admin.visi.index', [
            'data' => Visi::first()
        ]);
    }

    public function store_visi(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $data = Visi::first();
        if (!$data) {
            $data = new Visi();
        }

        $data->visi = $request->visi;
        $data->misi = $request->misi;
        $data->save();

        return back()->with('success', 'Visi & Misi berhasil disimpan');
    }
    // sejarah
    public function sejarah()
    {
        return view('admin.sejarah.index', [
            'data' => Sejarah::first()
        ]);
    }

    public function store_sejarah(Request $request)
    {
        $request->validate([
            'sejarah' => 'required',
        ]);

        $data = Sejarah::first();
        if (!$data) {
            $data = new Sejarah();
        }

        $data->sejarah = $request->sejarah;
        $data->save();

        return back()->with('success', 'Sejarah berhasil disimpan');
    }
    // Struktur
    public function struktur()
    {
        return view('admin.struktur.index', [
            'data' => Struktur::first()
        ]);
    }

    public function store_struktur(Request $request)
    {
        $request->validate([
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan'   => 'required'
        ]);

        $data = Struktur::first();
        if (!$data) {
            $data = new Struktur();
        }

        $changed = false;

        // Update judul & isi
        if ($data->keterangan !== $request->keterangan) {
            $data->keterangan   = $request->keterangan;
            $changed = true;
        }

        // Update foto jika ada upload baru
        if ($request->hasFile('gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }

            $data->gambar = $request->file('gambar')->store('struktur', 'public');
            $changed = true;
        }

        if ($changed) {
            $data->save();
            return back()->with('success', 'Data berhasil diperbarui');
        }

        return back()->with('info', 'Tidak ada perubahan data');
    }

    // profilks
    public function profilks()
    {
        return view('admin.profilks.profilks', [
            'data' => Profilks::first()
        ]);
    }
    public function store_ks(Request $request)
    {
        $request->validate([
            'nama'       => 'nullable|string',
            'fotoutama'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'judul1'     => 'nullable|string',
            'foto1'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'judul2'     => 'nullable|string',
            'foto2'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan1' => 'nullable',
            'keterangan2' => 'nullable',
            'keterangan3' => 'nullable',
        ]);

        $data = Profilks::first();
        if (!$data) {
            $data = new Profilks();
        }

        // =====================
        // TEXT
        // =====================
        $data->nama        = $request->nama;
        $data->judul1      = $request->judul1;
        $data->judul2      = $request->judul2;
        $data->keterangan1 = $request->keterangan1;
        $data->keterangan2 = $request->keterangan2;
        $data->keterangan3 = $request->keterangan3;

        // =====================
        // FOTO UTAMA
        // =====================
        if ($request->hasFile('fotoutama')) {
            if ($data->fotoutama && Storage::disk('public')->exists($data->fotoutama)) {
                Storage::disk('public')->delete($data->fotoutama);
            }

            $data->fotoutama = $request->file('fotoutama')
                ->store('profilks', 'public');
        }

        // =====================
        // FOTO 1
        // =====================
        if ($request->hasFile('foto1')) {
            if ($data->foto1 && Storage::disk('public')->exists($data->foto1)) {
                Storage::disk('public')->delete($data->foto1);
            }

            $data->foto1 = $request->file('foto1')
                ->store('profilks', 'public');
        }

        // =====================
        // FOTO 2
        // =====================
        if ($request->hasFile('foto2')) {
            if ($data->foto2 && Storage::disk('public')->exists($data->foto2)) {
                Storage::disk('public')->delete($data->foto2);
            }

            $data->foto2 = $request->file('foto2')
                ->store('profilks', 'public');
        }

        $data->save();

        return back()->with('success', 'Profil Kepala Sekolah berhasil disimpan');
    }
}
