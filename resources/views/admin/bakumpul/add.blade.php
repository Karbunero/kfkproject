@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}</h3>
            <div class="card-tools">
                <a href="/admin/bakumpul" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/admin/bakumpul" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Foto -->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input
                                id="foto"
                                name="foto"
                                type="file"
                                class="form-control-file @error('foto') is-invalid @enderror"
                                value="{{ old('foto') }}"
                                accept="image/*">
                            @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Kalimat -->
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
                        <!-- Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input
                                id="tanggal"
                                name="tanggal"
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="/admin/bakumpul" type="button" class="btn btn-danger float-right">Batal</a>
        </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!-- /.col-md-12 -->

@endsection
