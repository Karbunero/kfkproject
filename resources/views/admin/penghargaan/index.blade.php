@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Penghargaan</h3>
            <div class="card-tools">
                <a href="{{ route('penghargaan.create') }}" type="button" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i> Tambah Penghargaan
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> {{ session('pesan') }}</h5>
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="40px" class="text-center">No</th>
                        <th width="100px" class="text-center">Foto</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Posisi</th>
                        <th class="text-center">Bio</th>
                        <th width="100px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($penghargaan as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">
                                <img src="{{ $item->foto ? asset('foto/penghargaan/' . $item->foto) : asset('foto/penghargaan/default.png') }}"
                                     alt="Penghargaan Foto"
                                     style="width: 75px; height: auto;">
                            </td>
                            <td class="text-center">{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->posisi }}</td>
                            <td>{{ $item->bio }}</td>
                            <td class="text-center">
                                <a href="{{ route('penghargaan.edit', $item->id) }}" class="btn btn-warning btn-sm btn-flat">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('penghargaan.destroy', $item->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin mau hapus data?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
