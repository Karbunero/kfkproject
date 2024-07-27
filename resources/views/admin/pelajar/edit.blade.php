@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="{{ route('pelajar.index') }}" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pelajar.update', $pelajar->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($pelajar->foto)
                        <div class="form-group mt-2">
                            <p>Foto Saat Ini:</p>
                            <img src="{{ asset('foto/pelajar/' . $pelajar->foto) }}" alt="Current Foto" style="max-width: 300px;">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kalimat">Kalimat</label>
                    <textarea class="form-control @error('kalimat') is-invalid @enderror" id="kalimat" name="kalimat" rows="5">{{ old('kalimat', $pelajar->kalimat) }}</textarea>
                    @error('kalimat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $pelajar->tanggal->format('Y-m-d')) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route('pelajar.index') }}" class="btn btn-danger float-right">Batal</a>
            </form>
        </div>
    </div>
</div>

@endsection
