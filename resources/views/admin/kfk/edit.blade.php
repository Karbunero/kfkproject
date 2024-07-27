@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}
            </h3>
            <div class="card-tools">
                <a href="{{ route('kfk.index') }}" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('kfk.update', $kfk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($kfk->foto)
                            <div class="form-group">
                                <p>Foto Saat Ini:</p>
                                <img src="{{ asset('foto/kfk/' . $kfk->foto) }}" alt="Current Foto" style="max-width: 300px;">
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="kalimat">Kalimat</label>
                            <textarea class="form-control @error('kalimat') is-invalid @enderror" id="kalimat" name="kalimat" rows="5">{{ old('kalimat', $kfk->kalimat) }}</textarea>
                            @error('kalimat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $kfk->tanggal->format('Y-m-d')) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="{{ route('kfk.index') }}" type="button" class="btn btn-danger float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
