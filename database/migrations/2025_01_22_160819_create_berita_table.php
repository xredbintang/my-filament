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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul_berita');
            $table->foreignId('kategori_berita_id')->constrained('kategori', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('penulis_berita_id')->constrained('penulis','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('deskripsi_berita');
            $table->string('gambar_berita');
            $table->timestamp('tanggal_publikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
