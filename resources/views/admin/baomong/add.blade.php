@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}
            </h3>
            <div class="card-tools">
                <a href="/admin/baomong" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/baomong" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto</label>
                            <input name="foto" class="form-control @error('foto') is-invalid @enderror" type="file" value="{{ old('foto') }}" placeholder="Foto">
                            <div class="invalid-feedback">
                                @error('foto')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="kalimat">Kalimat</label>
                            <textarea
                                id="kalimat"
                                name="kalimat"
                                class="form-control @error('kalimat') is-invalid @enderror"
                                rows="3"
                                placeholder="Masukkan kalimat">{{ old('kalimat') }}</textarea>
                            @error('kalimat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date" value="{{ old('tanggal') }}" placeholder="Tanggal">
                            <div class="invalid-feedback">
                                @error('tanggal')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="/admin/baomong" type="button" class="btn btn-danger float-right">Batal</a>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
