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
        Schema::create('profilks', function (Blueprint $table) {
            $table->id();
            $table->string('fotoutama');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('nama');
            $table->string('judul1');
            $table->string('judul2');
            $table->text('keterangan1');
            $table->text('keterangan2');
            $table->text('keterangan3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilks');
    }
};
