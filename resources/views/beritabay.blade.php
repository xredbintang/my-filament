<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Berita</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-8">Daftar Berita</h1>
        
        <!-- Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($beritaberita as $berita)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Gambar Berita -->
                    <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="w-full h-56 object-cover" alt="Gambar Berita">
                    
                    <div class="p-6">
                        <!-- Judul Berita -->
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $berita->judul_berita }}</h2>
                        
                        <!-- Kategori dan Penulis -->
                        <p class="text-sm text-gray-500 mt-2">
                            <span class="font-semibold text-blue-500">{{ $berita->kategori->kategori_nama }}</span> 
                            | <span>{{ $berita->penulis->penulis_nama }}</span>
                        </p>
                        
                        <!-- Deskripsi -->
                        <p class="text-gray-700 mt-4">{!! Str::limit($berita->deskripsi_berita, 150) !!}</p>
                        
                        <!-- Tanggal Publikasi -->
                        <p class="text-sm text-gray-400 mt-4">{{ $berita->tanggal_publikasi }}</p>
                    </div>
                    
                    <!-- Tombol Detail Berita -->
                    <div class="px-6 pb-6">
                        <a href="{{ route('beritashow', $berita->id) }}" class="text-white bg-blue-500 hover:bg-blue-700 rounded-full py-2 px-4 text-center">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
