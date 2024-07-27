@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Kompetisi Film Pelajar NTT</h1>
    @if(isset($kompetisi) && $kompetisi->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($kompetisi as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/kompetisi/' . $item->foto) }}"
                            alt="Foto Kompetisi Film Pelajar NTT"
                            class="img-fluid kompetisi-film-pelajar-ntt-img">
                    @else
                        <img
                            src="{{ asset('foto/kompetisi_film_pelajar_ntt/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid kompetisi-film-pelajar-ntt-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="kompetisi-film-pelajar-ntt-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .kompetisi-film-pelajar-ntt-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .kompetisi-film-pelajar-ntt-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
