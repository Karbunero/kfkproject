@extends('layouts.backend')
@section('content')
        <div class="card card">
            <div class="card-header">
                {{-- <h3 class="card-title">{{ $title }}</h3> --}}

                <div class="card-tools">
                    <a href="/admin/bakumpul/create" type="button" class="btn btn-primary btn-sm btn-flat">
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
c

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection
