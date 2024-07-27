@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="/admin/beranda" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/beranda" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                    <a href="/admin/beranda" class="btn btn-danger float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
