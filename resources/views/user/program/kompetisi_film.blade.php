@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Kompetisi Film</h1>
    @if(isset($kompetisi) && $kompetisi->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($kompetisi as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/kompetisi/' . $item->foto) }}"
                            alt="Foto Kompetisi Film"
                            class="img-fluid kompetisi-film-img">
                    @else
                        <img
                            src="{{ asset('foto/kompetisi_film/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid kompetisi-film-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="kompetisi-film-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .kompetisi-film-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .kompetisi-film-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
