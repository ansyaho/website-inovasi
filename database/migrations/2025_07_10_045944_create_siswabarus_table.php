<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswabarus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psb_id');
            $table->string('nama');
            $table->string('gender');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('asalSekolah');
            $table->string('noTlp');
            $table->string('alamat');
            $table->string('kk');
            $table->string('ijazahSmp');
            $table->string('foto')->nullable();
            $table->string('status');
            $table->integer('skor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswabarus');
    }
};