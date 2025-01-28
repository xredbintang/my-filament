<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Berita</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto p-6">
        <!-- Kembali ke halaman utama -->
        <a href="{{ url()->previous() }}" class="text-blue-500 underline mb-4">Kembali ke daftar berita</a>
        
        <!-- Detail Berita -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Gambar Berita -->
            <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="w-full h-64 object-cover rounded-lg" alt="Gambar Berita">
            
            <!-- Judul Berita -->
            <h1 class="text-3xl font-bold mt-4">{{ $berita->judul_berita }}</h1>
            
            <!-- Kategori dan Penulis -->
            <p class="text-sm text-gray-500 mt-2">
                <span class="font-semibold text-blue-500">{{ $berita->kategori->kategori_nama }}</span> |
                <span>{{ $berita->penulis->penulis_nama }}</span> | 
                <span>{{ $berita->tanggal_publikasi }}</span>
            </p>
            
            <!-- Deskripsi Berita -->
            <div class="mt-6 text-gray-700">
                {!! $berita->deskripsi_berita !!}
            </div>
        </div>
    </div>
</body>
</html>
