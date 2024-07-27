<!-- resources/views/user/bioskop_pasjar.blade.php -->
@extends('layouts.fontend')

@section('content')
<!-- resources/views/user/program/bioskop_pasiar.blade.php -->

<div class="container">
    <h1>Data Bioskop</h1>
    @if(isset($bioskop) && $bioskop->isNotEmpty())
        <p>Data berhasil diambil.</p>
        @foreach($bioskop as $item)
            <div class="row mb-4 m-4">
                <div class="col-md-6 d-flex align-items-center">
                    @if($item->foto)
                        <img
                            src="{{ asset('foto/bioskop/' . $item->foto) }}"
                            alt="Foto Bioskop"
                            class="img-fluid bioskop-img">
                    @else
                        <img
                            src="{{ asset('foto/bioskop/default.png') }}"
                            alt="Foto Default"
                            class="img-fluid bioskop-img">
                    @endif
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <p class="bioskop-kalimat">{{ $item->kalimat }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</div>

<style>
    .bioskop-img {
        width: 50%;
        height: auto;
        object-fit: cover;
    }
    .bioskop-kalimat {
        text-align: left;
        margin: 0;
    }
</style>


@endsection
