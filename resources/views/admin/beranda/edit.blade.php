@extends('layouts.backend')

@section('content')
<div class="card card">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <a href="{{ route('beranda.index') }}" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-arrow-alt-circle-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('beranda.update', $beranda->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kalimat">Kalimat</label>
                <textarea name="kalimat" class="form-control @error('kalimat') is-invalid @enderror" id="kalimat" rows="4">{{ old('kalimat', $beranda->kalimat) }}</textarea>
                @error('kalimat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ route('beranda.index') }}" class="btn btn-danger float-right">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
