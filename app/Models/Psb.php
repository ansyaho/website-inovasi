<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

     public function siswabaru()
    {
        return $this->hasMany(SiswaBaru::class, 'psb_id');
    }
}