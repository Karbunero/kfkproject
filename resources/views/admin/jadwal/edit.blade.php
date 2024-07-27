@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a href="{{ route('jadwal.index') }}" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal.update', ['jadwal' => $jadwal->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="rundown">Rundown</label>
                    <textarea id="rundown" name="rundown" class="form-control @error('rundown') is-invalid @enderror" rows="5">{{ old('rundown', $jadwal->rundown) }}</textarea>
                    @error('rundown')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" placeholder="Masukkan jam mulai">
                    @error('jam_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" placeholder="Masukkan jam selesai">
                    @error('jam_selesai')
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
                                value="{{ old('tanggal', $jadwal->tanggal ? $jadwal->tanggal->format('Y-m-d') : '') }}"
                                placeholder="Tanggal"
                            >
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-danger float-right">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
