@extends('layouts.backend') @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
                <a
                    href="{{ route('jadwal.create') }}"
                    type="button"
                    class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i>
                    Tambah Jadwal
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>
                    <i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
            </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Rundown</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($jadwal as $jadwals)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($jadwals->tanggal)->isoFormat('D MMMM YYYY') }}</td>
                        <td class="text-center">{{ $jadwals->rundown }}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($jadwals->jam_mulai)->format('H:i') }}
                            -
                            {{ \Carbon\Carbon::parse($jadwals->jam_selesai)->format('H:i') }}
                        </td>

                        <td class="text-center">
                            <a
                                href="{{ route('jadwal.edit', $jadwals->id) }}"
                                class="btn btn-warning btn-sm btn-flat">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form
                                action="{{ route('jadwal.destroy', $jadwals->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin mau menghapus jadwal ini?')">
                                @method('DELETE') @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-flat">
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
</div>
@endsection