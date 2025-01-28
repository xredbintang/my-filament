<?php

use App\Http\Controllers\BeritaController;
use App\Models\BeritaModel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berita',function(){
    $beritaberita = BeritaModel::with('kategori','penulis')->get();
    return view('beritabay',compact('beritaberita'));
});

Route::get('/berita/{id}', [BeritaController::class,'show'])->name('beritashow'); {
};
