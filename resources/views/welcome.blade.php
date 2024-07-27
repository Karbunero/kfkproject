@extends('layouts.fontend') 
@section('content')
@include('layouts.carousel')
<hr>
<div class="container">
    @foreach($beranda as $item)
    <div class="row mb-4 m-4 mt-5">
        <div class="col-md-6 d-flex align-items-center">
            @if($item->foto)
            <img
                src="{{ asset('foto/beranda/' . $item->foto) }}"
                alt="Foto Beranda"
                class="img-fluid img-custom">
            @else
            <img
                src="{{ asset('foto/beranda/default.png') }}"
                alt="Foto Default"
                class="img-fluid img-custom">
            @endif
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <p class="text-custom">{{ $item->kalimat }}</p>
        </div>
    </div>
    @endforeach
</div>

@include('layouts.footer')
@endsection

<style>
    /* Default styles for large screens */
    .img-custom {
        width: 50%;
        height: auto;
        object-fit: cover;
    }

    .text-custom {
        text-align: left;
        margin: 0;
        font-size: 1.25rem; /* Default font size */
    }

    /* Medium screens (tablets) */
    @media (max-width: 992px) {
        .img-custom {
            width: 60%; /* Adjust image width */
        }

        .text-custom {
            font-size: 1.125rem; /* Adjust font size */
        }
    }

    /* Small screens (mobile devices) */
    @media (max-width: 576px) {
        .img-custom {
            width: 100%; /* Adjust image width */
        }

        .text-custom {
            font-size: 1rem; /* Adjust font size */
        }
    }
</style>
