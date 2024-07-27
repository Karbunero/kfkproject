@extends('layouts.backend') @section('content')

<div class="col-md-12">
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}</h3>
            <div class="card-tools">
                <a href="/admin/banner" type="button">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>

                </a>
            </div>

            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/admin/banner/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
                @method('put') @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Foto</label>
                            <input
                                name="foto"
                                class="form-control @error('foto') is-invalid @enderror"
                                type="file"
                                value="{{ old('foto',$banner->foto) }}"
                                placeholder="foto">
                            <div class="invalid-feedback">
                                @error('foto')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="/admin/banner" type="button" class="btn btn-danger float-right">Batal</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

@endsection