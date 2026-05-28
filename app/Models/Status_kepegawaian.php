<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_kepegawaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function gurus()
{
    return $this->hasMany(Guru::class);
}
}
