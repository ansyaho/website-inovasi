<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthentikasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaBaruController;
use App\Http\Controllers\SiswaController;
use App\Exports\UsersExport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', [Controller::class, 'home'])->name('asal');
Route::get('/sambutan', [Controller::class, 'sambutan']);
Route::get('/visimisi', [Controller::class, 'visimisi']);
Route::get('/sejarah', [Controller::class, 'sejarah']);
Route::get('/struktur', [Controller::class, 'struktur']);
Route::get('/profilkepala', [Controller::class, 'profilkepala']);

Route::get('/pendaftaranSiswaBaru', [SiswaBaruController::class, 'pendaftaranSiswaBaru']);
Route::get('/search-sekolah', [SiswaBaruController::class, 'searchSekolah'])
    ->name('search.sekolah');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['guest:web', 'guest:siswa'])->group(function () {
    Route::get('/login', [AuthentikasiController::class, 'login'])->name('login');
    Route::post('/login', [AuthentikasiController::class, 'prosesLogin'])->name('login.proses');
});

Route::post('/prosesSiswaBaru', [SiswaBaruController::class, 'prosesSiswaBaru']);

/*
|--------------------------------------------------------------------------
| ADMIN ROUTE (GUARD: web)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:web'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/ppdb', [AdminController::class, 'psb'])->name('ppdb');
    Route::get('/lihat', [AdminController::class, 'lihat'])->middleware('userAkses:admin');

    Route::get('/admin/psb/{id}/export-pdf', [AdminController::class, 'exportPdf'])
        ->name('admin.psb.export.pdf');

    Route::get('/admin/psb/{id}/export-excel', [AdminController::class, 'exportExcel'])
        ->name('admin.psb.export.excel');

    Route::get('/export-excel/{id}', function ($id) {
        return Excel::download(new UsersExport($id), 'users.xlsx');
    })->name('admin.psb.export.excel');

    // kode export siswa baru
    Route::get('/admin/siswa/{id}/export-pdf', [AdminController::class, 'exportPdfSiswa'])
        ->name('admin.siswa.export.pdf');

    Route::get('/admin/siswa/{id}/export-excel', [AdminController::class, 'exportExcelSiswa'])
        ->name('admin.siswa.export.excel');

    Route::get('/export-excel/siswa/{id}', function ($id) {
        return Excel::download(new SiswaExport($id), 'siswa.xlsx');
    })->name('admin.siswa.export.excel');

    Route::post('/psbProses', [AdminController::class, 'psbProses'])->middleware('userAkses:admin');
    Route::post('/psbProsesEdit/{Psb}', [AdminController::class, 'psbProsesEdit'])->middleware('userAkses:admin');
    Route::put('/siswa/{id}', [AdminController::class, 'update'])
        ->name('siswa.update')->middleware('userAkses:admin');

    Route::get('/editsambutan', [MenuController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/simpan-sambutan', [MenuController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/edit-visi', [MenuController::class, 'store_visi'])->middleware('userAkses:admin');
    Route::get('/visi-admin', [MenuController::class, 'visi'])->middleware('userAkses:admin');
    Route::get('/sejarah-admin', [MenuController::class, 'sejarah'])->middleware('userAkses:admin');
    Route::post('/simpan-sejarah', [MenuController::class, 'store_sejarah'])->middleware('userAkses:admin');
    Route::get('/struktur-admin', [MenuController::class, 'struktur'])->middleware('userAkses:admin');
    Route::post('/simpan-struktur', [MenuController::class, 'store_struktur'])->middleware('userAkses:admin');
    Route::get('/profilks', [MenuController::class, 'profilks'])->middleware('userAkses:admin');
    Route::post('/simpan-profilks', [MenuController::class, 'store_ks'])->middleware('userAkses:admin');

    Route::post('/logout/admin', [AuthentikasiController::class, 'logout'])
        ->name('logout.admin')
        ->middleware('auth:web');

    Route::get('/admin/tahun-ajaran', [AdminController::class, 'tahunAjaran'])
        ->name('admin.tahun');

    Route::post('/admin/tahun-ajaran/aktifkan/{id}', [AdminController::class, 'aktifkanTahun'])
        ->name('admin.tahun.aktifkan');

    Route::get('/admin/siswa-baru', [AdminController::class, 'dataSiswa'])
        ->name('admin.siswa');
    Route::post('/siswa/update-status', [AdminController::class, 'updateStatus'])
        ->name('siswa.updateStatus');

    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.diterima');
    Route::post('/admin/siswa/naik-kelas', [SiswaController::class, 'naikKelas'])->name('admin.siswa.naikKelas');
});

/*
|--------------------------------------------------------------------------
| SISWA ROUTE (GUARD: siswa)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:siswa'])->group(function () {

    Route::get('/akun', [SiswaBaruController::class, 'akun'])->name('siswa.dashboard');

    Route::post('/logout/siswa', [AuthentikasiController::class, 'logout'])
        ->name('logout.siswa');
    Route::post('/siswa/update-profile', [SiswaBaruController::class, 'update'])
        ->name('siswa.update.profile');
    Route::post('/ujian-submit', [SiswaBaruController::class, 'submit'])->name('ujian.submit');
});
