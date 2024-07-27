@extends('layouts.fontend') {{-- Pastikan layout Anda sudah termasuk pemanggilan CSS Bootstrap --}}

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Formulir Pengisian Data</div>
            <div class="btn-container text-right mt-4 mr-2">
                <a href="{{ route('welcome') }}" class="btn-costum">Kembali ke Menu Utama</a>
            </div>


            <div class="card-body" style="display: flex;">
                <form action="{{ route('formulir1') }}" method="POST" enctype="multipart/form-data" style="flex: 1;">
                    @csrf
                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1; padding-right: 15px;">
            <form action="{{ route('formulir1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="asal_alamat_lengkap">Alamat Lengkap</label>
                    <textarea class="form-control" id="asal_alamat_lengkap" name="asal_alamat_lengkap" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
                <div class="form-group">
                    <label for="media_sosial">Media Sosial</label>
                    <input type="text" class="form-control" id="media_sosial" name="media_sosial" required>
                </div>
                <div class="form-group">
                    <label for="judul_proyek_film">Judul Proyek Film</label>
                    <input type="text" class="form-control" id="judul_proyek_film" name="judul_proyek_film" required>
                </div>
                        </div>
                        <div style="flex: 1; padding-left: 15px;">
                    <div class="form-group">
                    <label for="logline">Logline</label>
                    <textarea class="form-control" id="logline" name="logline" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="treatment">Treatment</label>
                    <input type="file" class="form-control-file" id="treatment" name="treatment" required>
                </div>
                <div class="form-group">
                    <label for="statement_produser">Statement Produser</label>
                    <textarea class="form-control" id="statement_produser" name="statement_produser" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="statement_sutradara">Statement Sutradara</label>
                    <textarea class="form-control" id="statement_sutradara" name="statement_sutradara" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="cv_filmography">CV Filmography</label>
                    <input type="file" class="form-control-file" id="cv_filmography" name="cv_filmography" required>
                </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn btn-gradient">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
