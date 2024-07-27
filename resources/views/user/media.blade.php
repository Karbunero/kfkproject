@extends('layouts.fontend')

@section('content')
@include('layouts.carousel')

<h1 class="judul mt-5">MEDIA & PUBLIKASI</h1>
<hr>
<div class="article-grid">
    @foreach ($artikels as $artikel)
    <div class="article">
        <a href="{{ route('user.show', $artikel->id) }}">
            <div class="article-content">
                <div class="article-image">
                    <img
                        src="{{ $artikel->foto ? asset('foto/artikel/' . $artikel->foto) : asset('foto/artikel/user.png') }}"
                        alt="Artikel"
                        style="width: 100%; height: 150px; object-fit: contain;">
                </div>
            </div>
        </a>
        <div class="article-text">
            <h2 class="article-title">
                {{ Str::limit($artikel->judul, 100, '...') }}
            </h2>
            <div class="author">{{ $artikel->penulis }}</div>
            <hr>
            <!-- Garis pembatas -->
            <p class="article-sentence">
                {{ Str::limit($artikel->kalimat, 100) }}
                <a href="{{ route('user.show', $artikel->id) }}">Selengkapnya</a>
            </p>
            <p class="article-date">
                {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d-m-Y') }}
            </p>
        </div>
    </div>
    @endforeach
</div>

<!-- Link Pagination -->
<div class="pagination-container mt-4">
    {{ $artikels->links('pagination::bootstrap-4') }}
</div>

@include('layouts.footer')

<style>
    .article-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .article {
        flex: 1 1 calc(33.333% - 1rem); /* 3 kolom dengan jarak 1rem */
        box-sizing: border-box;
        background-color: #fff; /* Background color for articles */
        border-radius: 8px; /* Optional: add border-radius for rounded corners */
        padding: 10px; /* Optional: add padding inside the article */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: add box shadow */
    }

    .article-image img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .article-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .article-sentence {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .article-date {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .pagination-container {
        text-align: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .article {
            flex: 1 1 calc(50% - 1rem); /* 2 kolom pada layar lebih kecil */
        }
    }

    @media (max-width: 576px) {
        .article {
            flex: 1 1 100%; /* 1 kolom pada layar kecil */
        }

        .judul {
            font-size: 2rem; /* Ukuran font judul lebih kecil pada layar kecil */
        }
    }
</style>
@endsection
