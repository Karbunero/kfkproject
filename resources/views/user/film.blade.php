@extends('layouts.fontend')@section('content')
@include('layouts.carousel')
<div class="container">
    <h1 class="judul mt-5">FILM</h1>
    <hr>
    @if(isset($film) && $film->isNotEmpty())
        <div class="row">
            @foreach($film as $films)
                <div class="col-md-12 mb-4">
                    <div class="row align-items-center">
                        <!-- Foto -->
                        <div class="col-md-3">
                            <img
                                src="{{ $films->foto ? asset('foto/film/' . $films->foto) : asset('foto/film/default.png') }}"
                                class="img-fluid film-img"
                                alt="Foto Film">
                        </div>
                        <!-- Detail Film -->
                        <div class="col-md-9">
                            <h2 class="film-judul">{{ $films->judul }}</h2>
                            <p><strong>Sutradara:</strong> {{ $films->sutradara }}</p>
                            <p><strong>Genre:</strong> {{ $films->genre }}</p>
                            <p><strong>Durasi:</strong> {{ $films->durasi }}</p>
                            <p><strong>Rating Usia:</strong> {{ $films->rating_usia }}</p>
                            <p><strong>Sinopsis:</strong> {{ $films->sinopsis }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

    @include('layouts.footer')

<style>
    .film-img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .film-judul {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    .film-detail {
        font-size: 16px;
        margin: 0;
        color: #666;
    }
    .film-detail strong {
        color: #000;
    }

        /* Media Queries untuk layar kecil */
    @media (max-width: 768px) {
        .judul {
            font-size: 40px;
        }
    }

    @media (max-width: 576px) {
                .judul {
            font-size: 40px;
        }
    }
</style>

@endsection
