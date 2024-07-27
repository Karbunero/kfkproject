<!-- resources/views/user/program.blade.php -->
@extends('layouts.fontend')@section('content')
@include('layouts.carousel')
    <h1 class="judul mt-5">PROGRAM</h1>
    <hr>
    <div class="program-grid">
        <div class="program-card">
            <a href="{{ route('user.program.bioskop_pasiar') }}">
                <div class="program-content">Bioskop Pasiar</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.kompetisi_film') }}">
                <div class="program-content">Kompetisi Film</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.layar_nusantara') }}">
                <div class="program-content">Layar Nusantara</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.bakumpul_komunitas') }}">
                <div class="program-content">Bakumpul Komunitas</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.kfk_film_lab') }}">
                <div class="program-content">KFK Film Lab</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.kompetisi_film_pelajar_ntt') }}">
                <div class="program-content">Kompetisi Film Pelajar NTT</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.layar_internasional') }}">
                <div class="program-content">Layar Internasional</div>
            </a>
        </div>
        <div class="program-card">
            <a href="{{ route('user.program.baomong_film') }}">
                <div class="program-content">Baomong Film</div>
            </a>
        </div>
    </div>
    @include('layouts.footer')
@endsection

<style>
    .program-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 kolom pada layar besar */
        gap: 20px;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 40px;
    }
    .program-card {
        background-color: #EFE8FF;
        border-radius: 10px;
        padding: 30px; /* Padding lebih kecil agar lebih responsif */
        transition: background-color 0.3s ease;
    }
    .program-card a {
        color: #000;
        text-decoration: none;
    }
    .program-card:hover {
        background-color: #DBCCFF;
        text-decoration: none;
    }
    .program-content {
        font-size: 20px; /* Ukuran font lebih kecil untuk responsivitas */
        font-weight: bold;
    }

    /* Media Queries untuk layar kecil */
    @media (max-width: 768px) {
        .judul {
            font-size: 40px;
        }
        .program-grid {
            grid-template-columns: repeat(2, 1fr); /* 2 kolom pada layar sedang */
        }
        .program-card {
            padding: 20px; /* Padding lebih kecil pada layar sedang */
        }
        .program-content {
            font-size: 16px; /* Ukuran font lebih kecil pada layar sedang */
        }
    }

    @media (max-width: 576px) {
                .judul {
            font-size: 40px;
        }
        .program-grid {
            grid-template-columns: 1fr; /* 1 kolom pada layar kecil */
        }
        .program-card {
            padding: 15px; /* Padding lebih kecil pada layar kecil */
        }
        .program-content {
            font-size: 16px; /* Ukuran font lebih kecil pada layar kecil */
        }
    }
</style>
