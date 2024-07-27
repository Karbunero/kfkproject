@extends('layouts.fontend')

@section('content')

<div class="container">
    <h1>Data Bakumpul Komunitas</h1>
    @if(isset($bakumpul) && $bakumpul->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($bakumpul as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/bakumpul/' . $item->foto) }}"
                            alt="Foto Bakumpul Komunitas"
                            class="img-fluid bakumpul-komunitas-img">
                    @else
                        <img
                            src="{{ asset('foto/bakumpul_komunitas/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid bakumpul-komunitas-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="bakumpul-komunitas-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .bakumpul-komunitas-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .bakumpul-komunitas-kalimat {
        text-align: left;
        margin: 0;
    }
</style>

@endsection
