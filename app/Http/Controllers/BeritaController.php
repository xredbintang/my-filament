<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function show($id){
        $berita = BeritaModel::findOrFail($id);
        return view('beritashow',compact('berita'));
    }
}
