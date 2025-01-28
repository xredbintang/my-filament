<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kelas';

    public function siswa(){
        return $this->hasMany(siswa::class,'kelas_siswa_id','id');
    }
    public function getFullClassAttribute()
    {
        return $this->tingkatan . ' ' . $this->nama_kelas;
    }
}
