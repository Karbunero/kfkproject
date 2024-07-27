@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="{{ route('layar.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('layar.update', $layar->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                    @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($layar->foto)
                    <div class="mt-3">
                        <p>Foto Saat Ini:</p>
                        <img src="{{ asset('foto/layar/' . $layar->foto) }}" alt="Current Foto" style="max-width: 300px;">
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kalimat">Kalimat</label>
                    <textarea class="form-control @error('kalimat') is-invalid @enderror" id="kalimat" name="kalimat" rows="5">{{ old('kalimat', $layar->kalimat) }}</textarea>
                    @error('kalimat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $layar->tanggal) }}">
                    @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection