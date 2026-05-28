<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SiswaBaru extends Authenticatable
{
    protected $table = 'siswabarus';
    use HasFactory;
    protected $guarded = ['id'];

    public function psb()
    {
        return $this->belongsTo(Psb::class, 'psb_id');
    }
}
