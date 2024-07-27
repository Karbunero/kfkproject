@extends('layouts.fontend') {{-- Pastikan layout Anda sudah termasuk pemanggilan CSS Bootstrap --}}

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Formulir Pengisian Data Film</div>
                <div class="btn-container text-right mt-4 mr-2">
                    <a href="{{ route('welcome') }}" class="btn-costum">Kembali ke Menu Utama</a>
                </div>

            <div class="card-body" style="display: flex;">
                <form action="{{ route('formulir2') }}" method="POST" enctype="multipart/form-data" style="flex: 1;">
                    @csrf
                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 1; padding-right: 15px;">
                            <div class="form-group">
                                <label for="judul_film">Judul Film</label>
                                <input type="text" class="form-control" id="judul_film" name="judul_film" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap_sutradara">Nama Lengkap Sutradara</label>
                                <input type="text" class="form-control" id="nama_lengkap_sutradara" name="nama_lengkap_sutradara" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori_film">Kategori Film</label>
                                <select class="form-control" id="kategori_film" name="kategori_film" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Fiksi">Fiksi</option>
                                    <option value="Dokumenter">Dokumenter</option>
                                    <option value="Eksperimental">Eksperimental</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_produksi">Tahun Produksi</label>
                                <input type="number" class="form-control" id="tahun_produksi" name="tahun_produksi">
                            </div>
                            <div class="form-group">
                                <label for="komunitas_rumah_produksi">Komunitas / Rumah Produksi</label>
                                <input type="text" class="form-control" id="komunitas_rumah_produksi" name="komunitas_rumah_produksi">
                            </div>
                            <div class="form-group">
                                <label for="logline">Logline</label>
                                <textarea class="form-control" id="logline" name="logline" rows="3"></textarea>
                            </div>
                        </div>
                        <div style="flex: 1; padding-left: 15px;">
                            <div class="form-group">
                                <label for="sinopsis_pendek">Sinopsis Pendek</label>
                                <textarea class="form-control" id="sinopsis_pendek" name="sinopsis_pendek" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sinopsis_panjang">Sinopsis Panjang</label>
                                <textarea class="form-control" id="sinopsis_panjang" name="sinopsis_panjang" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kontak_whatsapp">Kontak WhatsApp</label>
                                <input type="text" class="form-control" id="kontak_whatsapp" name="kontak_whatsapp">
                            </div>
                            <div class="form-group">
                                <label for="media_sosial_sutradara">Media Sosial Sutradara / Komunitas</label>
                                <input type="text" class="form-control" id="media_sosial_sutradara" name="media_sosial_sutradara">
                            </div>
                            <div class="form-group">
                                <label for="link">Tempelkan Tautan di Sini</label>
                                <input type="text" class="form-control" id="link" name="link">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
                            <button type="submit" class="btn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
