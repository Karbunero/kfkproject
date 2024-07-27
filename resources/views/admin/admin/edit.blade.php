@extends('layouts.backend') 
@section('content')

<div class="col-md-12">
    <div class="card card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $title }}</h3>
                <div class="card-tools">
                    <a href="/admin/admin" type="button" >
                        <i class="fas fa-arrow-alt-circle-left" style="font-size:28px"></i>
                        
                    </a>
                </div>

            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/admin/admin/{{ $admin->id }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                type="text"
                                value="{{ old('name',$admin->name) }}"
                                placeholder="Nama Lengkap">
                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Email</label>
                            <input
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                type="email"
                                value="{{ old('email',$admin->email) }}"
                                placeholder="Email">
                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                type="password"
                                value="{{ old('password',$admin->password) }}"
                                placeholder="Password">
                            <div class="invalid-feedback">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="/admin/admin" type="button" class="btn btn-danger float-right">Batal</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

@endsection