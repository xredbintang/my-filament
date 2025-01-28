<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = [];
    public function kelas(){
        return $this->belongsTo(kelas::class,'kelas_siswa_id','id');
    }
}
