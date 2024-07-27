@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Layar Internasional</h1>
    @if(isset($internasional) && $internasional->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($internasional as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/internasional/' . $item->foto) }}"
                            alt="Foto Layar Internasional"
                            class="img-fluid layar-internasional-img">
                    @else
                        <img
                            src="{{ asset('foto/internasional/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid layar-internasional-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="layar-internasional-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .layar-internasional-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .layar-internasional-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
