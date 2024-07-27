@extends('layouts.backend')

@section('content')
<div class="card card">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route('beranda.create') }}" type="button" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-plus"></i>
                Tambah Data Beranda
            </a>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>
                    <i class="icon fas fa-check"></i> {{ session('pesan') }}
                </h5>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>
                    <i class="icon fas fa-ban"></i> {{ session('error') }}
                </h5>
            </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="40px" class="text-center">No</th>
                    <th width="100px" class="text-center">Foto</th>
                    <th class="text-center">Kalimat</th>
                    <th width="100px" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($beranda as $item)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">
                            @if($item->foto)
                                <img src="{{ asset('foto/beranda/' . $item->foto) }}" alt="Foto Beranda" style="width: 75%; height: auto;">
                            @else
                                <img src="{{ asset('foto/beranda/default.png') }}" alt="Foto Default" style="width: 75%; height: auto;">
                            @endif
                        </td>
                        <td class="text-center">{{ Str::limit($item->kalimat, 50) }}</td>
                        <td class="text-center">
                            <a href="{{ route('beranda.edit', $item->id) }}" class="btn btn-warning btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('beranda.destroy', $item->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Yakin mau hapus data ini?')">
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
@endsection
