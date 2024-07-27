@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}
            </h3>
            <div class="card-tools">
                <a href="/admin/bioskop" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/bioskop/{{ $bioskop->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Foto</label>
                            <input name="foto" class="form-control @error('foto') is-invalid @enderror" type="file" value="{{ old('foto',$bioskop->foto) }}" placeholder="Foto">
                            <div class="invalid-feedback">
                                @error('foto')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Kalimat</label>
                            <input name="kalimat" class="form-control @error('kalimat') is-invalid @enderror" type="text" value="{{ old('kalimat',$bioskop->kalimat) }}" placeholder="Kalimat">
                            <div class="invalid-feedback">
                                @error('kalimat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" type="date" value="{{ old('tanggal', $bioskop->tanggal->format('Y-m-d')) }}" placeholder="Tanggal">
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
            <a href="/admin/bioskop" type="button" class="btn btn-danger float-right">Batal</a>
        </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

@endsection
