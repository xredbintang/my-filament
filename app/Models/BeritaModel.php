<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded = [];

    public function penulis(){
        return $this->belongsTo(PenulisModel::class,'penulis_berita_id');
    }
    public function kategori(){
        return $this->belongsTo(KategoriModel::class,'kategori_berita_id');
    }
}
