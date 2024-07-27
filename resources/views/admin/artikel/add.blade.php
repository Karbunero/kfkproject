@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="/admin/artikel" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/artikel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Penulis</label>
                            <input name="penulis" class="form-control @error('penulis') is-invalid @enderror" type="text" value="{{ old('penulis') }}" placeholder="Penulis">
                            @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input name="judul" class="form-control @error('judul') is-invalid @enderror" type="text" value="{{ old('judul') }}" placeholder="Judul">
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date" value="{{ old('tanggal') }}" placeholder="Tanggal">
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Kalimat</label>
                            <textarea name="kalimat" class="form-control @error('kalimat') is-invalid @enderror" placeholder="Kalimat">{{ old('kalimat') }}</textarea>
                            @error('kalimat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="/admin/artikel" class="btn btn-danger float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
