<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'kategori';

    public function berita(){
        return $this->hasMany(BeritaModel::class);
    }
}
