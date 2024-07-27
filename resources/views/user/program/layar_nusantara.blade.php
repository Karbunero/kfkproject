@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Layar Nusantara</h1>
    @if(isset($layar) && $layar->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($layar as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/layar/' . $item->foto) }}"
                            alt="Foto Layar Nusantara"
                            class="img-fluid layar-nusantara-img">
                    @else
                        <img
                            src="{{ asset('foto/layar_nusantara/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid layar-nusantara-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="layar-nusantara-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .layar-nusantara-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .layar-nusantara-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
