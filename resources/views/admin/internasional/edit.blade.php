@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}
            </h3>
            <div class="card-tools">
                <a href="{{ route('internasional.index') }}" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('internasional.update', ['internasional' => $internasional->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input id="foto" name="foto" class="form-control-file @error('foto') is-invalid @enderror" type="file" value="{{ old('foto', $internasional->foto) }}">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if ($internasional->foto)
                                <div class="form-group mt-2">
                                    <p>Foto Saat Ini:</p>
                                    <img src="{{ asset('/foto/internasional/' . $internasional->foto) }}" alt="Current Foto" style="max-width: 300px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="kalimat">Kalimat</label>
                            <textarea id="kalimat" name="kalimat" class="form-control @error('kalimat') is-invalid @enderror" rows="3">{{ old('kalimat', $internasional->kalimat) }}</textarea>
                            @error('kalimat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date" value="{{ old('tanggal', $internasional->tanggal->format('Y-m-d')) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="{{ route('internasional.index') }}" type="button" class="btn btn-danger float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
