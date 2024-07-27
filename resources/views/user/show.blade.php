@extends('layouts.fontend') {{-- Pastikan layout Anda sudah termasuk pemanggilan CSS Bootstrap --}}

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Detail Artikel</title>
</head>
<body class="bg-gray-100 items-center justify-center h-screen">
<div class="btn-container text-right mt-4 mb-4 mr-2">
                    <a href="{{ route('media') }}" class="btn-costum">Kembali</a>
                </div>
    <div class="container-show">
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="judul-artikel">{{ $artikel->judul }}</h2>
            <div class="gambar-container">
                <img src="{{ asset('foto/artikel/' . $artikel->foto) }}" alt="Gambar Artikel" class="gambar-artikel rounded-lg">
            </div>
            <div class="md:flex md:flex-row md:items-center md:justify-center p-4">
                <div class="md:w-1/2 md:text-center">
                    <p class="mb-4">{{ $artikel->kalimat }}</p>
                </div>
                            <p class="article-date">
                {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d-m-Y') }}
            </p>
            </div>
        </div>
    </div>
</body>
</html>



@endsection
