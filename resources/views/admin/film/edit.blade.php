@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ $title }}
                </h3>
                <div class="card-tools">
                    <a href="/admin/film" type="button">
                        <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="/admin/film/{{ $film->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input name="judul" class="form-control @error('judul') is-invalid @enderror"
                                    type="text" value="{{ old('judul', $film->judul) }}" placeholder="Judul">
                                <div class="invalid-feedback">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input name="foto" class="form-control @error('foto') is-invalid @enderror"
                                    type="file" value="{{ old('foto', $film->foto) }}" placeholder="Foto">
                                <div class="invalid-feedback">
                                    @error('foto')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sutradara</label>
                                <input name="sutradara" class="form-control @error('sutradara') is-invalid @enderror"
                                    type="text" value="{{ old('sutradara', $film->sutradara) }}" placeholder="Sutradara">
                                <div class="invalid-feedback">
                                    @error('sutradara')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Genre</label>
                                <input name="genre" class="form-control @error('genre') is-invalid @enderror"
                                    type="text" value="{{ old('genre', $film->genre) }}" placeholder="Genre">
                                <div class="invalid-feedback">
                                    @error('genre')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Durasi</label>
                                <input name="durasi" class="form-control @error('durasi') is-invalid @enderror"
                                    type="text" value="{{ old('durasi', $film->durasi) }}" placeholder="Durasi">
                                <div class="invalid-feedback">
                                    @error('durasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Rating Usia</label>
                                <input name="rating_usia" class="form-control @error('rating_usia') is-invalid @enderror"
                                    type="text" value="{{ old('rating_usia', $film->rating_usia) }}"
                                    placeholder="Rating Usia">
                                <div class="invalid-feedback">
                                    @error('rating_usia')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sinopsis</label>
                                <textarea name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" rows="5"
                                    placeholder="Sinopsis">{{ old('sinopsis', $film->sinopsis) }}</textarea>
                                <div class="invalid-feedback">
                                    @error('sinopsis')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="/admin/film" type="button" class="btn btn-danger float-right">Batal</a>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection
