@extends('layouts.backend')

@section('content')
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">Edit Artikel</h3>
            <div class="card-tools">
                <a href="/admin/artikel" type="button" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-sm-6">
                        <!-- Penulis -->
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input
                                id="penulis"
                                name="penulis"
                                type="text"
                                class="form-control @error('penulis') is-invalid @enderror"
                                value="{{ old('penulis', $artikel->penulis) }}"
                                placeholder="Penulis"
                            >
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Judul -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input
                                id="judul"
                                name="judul"
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $artikel->judul) }}"
                                placeholder="Judul"
                            >
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Foto input -->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input
                                type="file"
                                class="form-control-file @error('foto') is-invalid @enderror"
                                id="foto"
                                name="foto"
                            >
                            @if ($artikel->foto)
                                <img src="{{ asset('foto/artikel/' . $artikel->foto) }}" alt="Foto Artikel" style="width: 150px; height: auto; margin-top: 10px;">
                            @endif
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input
                                id="tanggal"
                                name="tanggal"
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', $artikel->tanggal ? $artikel->tanggal->format('Y-m-d') : '') }}"
                                placeholder="Tanggal"
                            >
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <!-- Kalimat input -->
                        <div class="form-group">
                            <label for="kalimat">Kalimat</label>
                            <textarea
                                id="kalimat"
                                name="kalimat"
                                class="form-control @error('kalimat') is-invalid @enderror"
                                placeholder="Kalimat">{{ old('kalimat', $artikel->kalimat) }}</textarea>
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
@endsection
