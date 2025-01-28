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
        Schema::create('beritaawoajwiojaoiw', function (Blueprint $table) {
            $table->id();
            $table->string('berita_judul');
            $table->string('berita_deskripsi');
            $table->string('berita_gambar');
            $table->foreignId('berita_kategori_id')->constrained('kategori','id')->cascadeOnUpdate()->cascadeOnDelete;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritaawoajwiojaoiw');
    }
};
