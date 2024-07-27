@extends('layouts.backend')
@section('content')
    <div class="col-md-12">
        <div class="card card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                    <a href="/admin/admin/create" type="button" class="btn btn-primary btn-sm btn-flat">
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
                            <th width="100px" class="text-center">Nama</th>
                            <th width="100px" class="text-center">Email</th>
                            <th width="100px" class="text-center">Password</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($admin as $admins)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $admins->name }}</td>
                                <td class="text-center">{{ $admins->email }}</td>
                                <td class="text-center">{{ $admins->password }}</td>
                                <td class="text-center">
                                    <a href="/admin/admin/{{ $admins->id }}/edit" class="btn btn-warning btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="/admin/admin/{{ $admins->id }}" method="post" class="d-inline">
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
    </div>
@endsection
