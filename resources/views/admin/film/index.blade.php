@extends('layouts.backend')
@section('content')
    <div class="card card">
        <div class="card-header">
            <div class="card-tools">
                <a href="/admin/film/create" type="button" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i>
                    Add Film
                </a>
            </div>
        </div>

        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>
                        <i class="icon fas fa-check"></i>{{ session('pesan') }}
                    </h5>
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th width="40px" class="text-center">No</th>
                        <th width="100px" class="text-center">Judul</th>
                        <th width="100px" class="text-center">Foto</th>
                        <th width="100px" class="text-center">Sutradara</th>
                        <th width="100px" class="text-center">Genre</th>
                        <th width="80px" class="text-center">Durasi</th>
                        <th width="80px" class="text-center">Rating Usia</th>
                        <th width="300px" class="text-center">Sinopsis</th>
                        <th width="100px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($film as $films)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $films->judul }}</td>
                            <td class="text-center">
                                <img src="{{ $films->foto ? asset('foto/film/' . $films->foto) : asset('foto/film/default.png') }}"
                                    alt="Film Poster" style="width: 75%; height: 100%;">
                            </td>
                            <td class="text-center">{{ $films->sutradara }}</td>
                            <td class="text-center">{{ $films->genre }}</td>
                            <td class="text-center">{{ $films->durasi }}</td>
                            <td class="text-center">{{ $films->rating_usia }}</td>
                            <td class="text-center">{{ $films->sinopsis }}</td>
                            <td class="text-center">
                                <a href="/admin/film/{{ $films->id }}/edit" class="btn btn-warning btn-sm btn-flat">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="/admin/film/{{ $films->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-flat"
                                        onclick="return confirm('Yakin Mau Hapus Data?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
