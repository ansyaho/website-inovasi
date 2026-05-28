<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Visi;
use App\Models\Struktur;
use App\Models\Profilks;
use App\Models\Sejarah;
use App\Models\Sambutan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        return view('main.index');
    }

    public function sambutan()
    {
        return view('profil.sambutan', [
            'data' => Sambutan::first()
        ]);
    }

    public function visimisi()
    {
        return view('profil.visimisi', [
            'data' => Visi::first()
        ]);
    }

    public function sejarah()
    {
        return view('profil.sejarah', [
            'data' => Sejarah::first()
        ]);
    }

    public function struktur()
    {
        return view('profil.struktur', [
            'data' => Struktur::first()
        ]);
    }

    public function profilkepala()
    {
        return view('profil.profilkepala', [
            'data' => Profilks::first()
        ]);
    }
}
