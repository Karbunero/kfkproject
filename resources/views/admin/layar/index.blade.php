@extends('layouts.backend')
@section('content')
        <div class="card card">
            <div class="card-header">
                {{-- <h3 class="card-title">{{ $title }}</h3> --}}

                <div class="card-tools">
                    <a href="/admin/layar/create" type="button" class="btn btn-primary btn-sm btn-flat">
                        <i class="fa fa-plus"></i>
                        Add
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
                            <i class="icon fas fa-check"></i>{{ session('pesan') }}
                        </h5>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th width="40px" class="text-center">No</th>
                            <th width="100px" class="text-center">Foto</th>
                            <th width="100px" class="text-center">Kalimat</th>
                            <th width="100px" class="text-center">Tanggal</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($layar as $layars)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">
                                    <img src="{{ $layars->foto ? asset('foto/layar/' . $layars->foto) : asset('foto/layar/user.png') }}"
                                         alt="User Avatar"
                                         style="width: 75%; height: 100%;">

                                </td>
                                <td class="text-center">{{ $layars->kalimat }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($layars->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                                <td class="text-center">
                                    <a href="/admin/layar/{{ $layars->id }}/edit" class="btn btn-warning btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="/admin/layar/{{ $layars->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm btn-flat"
                                            onclick="return confirm('Yakin Mau Hapus Data?')"> <i
                                                class="fa fa-trash"></i></button>
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
