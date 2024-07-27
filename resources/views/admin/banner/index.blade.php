@extends('layouts.backend')
@section('content')
    <div class="col-md-12">
    <div class="col-sm-12">
      <div style="padding: 15px; background-color: #ffffcc; color: #333; border-radius: 5px; display: flex; align-items: center;">
        <span style="font-size: 20px; margin-right: 10px;">⚠️</span>
        <span style="font-size: 16px;">Pastikan banner Anda memiliki dimensi 3700 x 1140 
          dan berukuran maksimum 2 MB. </span>
      </div>
    </div>

        <div class="card card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                    <a href="/admin/banner/create" type="button" class="btn btn-primary btn-sm btn-flat">
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
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($banner as $banners)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">
                                    <img src="{{ $banners->foto ? asset('foto/banner/' . $banners->foto) : asset('foto/banner/user.png') }}"
                                         alt="User Avatar"
                                         style="width: 1250px; height: 370px;">
                                   
                                </td>
                                <td class="text-center">
                                    <a href="/admin/banner/{{ $banners->id }}/edit" class="btn btn-warning btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="/admin/banner/{{ $banners->id }}" method="post" class="d-inline">
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
