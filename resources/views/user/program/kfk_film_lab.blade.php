@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data KFK Film Lab</h1>
    @if(isset($kfk) && $kfk->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($kfk as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/kfk/' . $item->foto) }}"
                            alt="Foto KFK Film Lab"
                            class="img-fluid kfk-film-lab-img">
                    @else
                        <img
                            src="{{ asset('foto/kfk_film_lab/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid kfk-film-lab-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="kfk-film-lab-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .kfk-film-lab-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .kfk-film-lab-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
