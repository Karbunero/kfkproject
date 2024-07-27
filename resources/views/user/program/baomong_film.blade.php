@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Baomong Film</h1>
    @if(isset($baomong) && $baomong->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($baomong as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/baomong/' . $item->foto) }}"
                            alt="Foto Baomong Film"
                            class="img-fluid baomong-film-img">
                    @else
                        <img
                            src="{{ asset('foto/baomong/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid baomong-film-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="baomong-film-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .baomong-film-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .baomong-film-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
