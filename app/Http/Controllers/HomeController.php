<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir1;
use App\Models\Formulir2;
use PDO;

class HomeController extends Controller
{

    public function formulir1(Request $request)
    {
        // Validasi data yang diterima dari form dengan pesan kesalahan khusus
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'asal_alamat_lengkap' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'media_sosial' => 'required|string|max:255',
            'judul_proyek_film' => 'required|string|max:255',
            'logline' => 'required|string',
            'sinopsis' => 'required|string',
            'treatment' => 'required|file|mimes:doc,docx,pdf|max:20048',
            'statement_produser' => 'required|string',
            'statement_sutradara' => 'required|string',
            'cv_filmography' => 'required|file|mimes:doc,docx,pdf|max:20048',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong.',
            'gender.required' => 'Gender tidak boleh kosong.',
            'gender.in' => 'Gender harus Laki-laki atau Perempuan.',
            'asal_alamat_lengkap.required' => 'Alamat Lengkap tidak boleh kosong.',
            'no_hp.required' => 'Nomor HP tidak boleh kosong.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'media_sosial.required' => 'Media Sosial tidak boleh kosong.',
            'media_sosial.max' => 'Media Sosial tidak boleh lebih dari 255 karakter.',
            'judul_proyek_film.required' => 'Judul Proyek Film tidak boleh kosong.',
            'judul_proyek_film.max' => 'Judul Proyek Film tidak boleh lebih dari 255 karakter.',
            'logline.required' => 'Logline tidak boleh kosong.',
            'sinopsis.required' => 'Sinopsis tidak boleh kosong.',
            'treatment.required' => 'Treatment tidak boleh kosong.',
            'treatment.mimes' => 'Treatment harus berupa file dengan format .doc, .docx, atau .pdf.',
            'treatment.max' => 'Treatment tidak boleh lebih dari 20MB.',
            'statement_produser.required' => 'Statement Produser tidak boleh kosong.',
            'statement_sutradara.required' => 'Statement Sutradara tidak boleh kosong.',
            'cv_filmography.required' => 'CV Filmography tidak boleh kosong.',
            'cv_filmography.mimes' => 'CV Filmography harus berupa file dengan format .doc, .docx, atau .pdf.',
            'cv_filmography.max' => 'CV Filmography tidak boleh lebih dari 20MB.',
        ]);

        // Ambil judul_proyek_film dan ubah ke format URL-friendly
        $judulProyekFilm = str_replace(' ', '_', strtolower($request->judul_proyek_film));

        if ($request->hasFile('treatment')) {
            // Ambil file treatment dari request
            $treatment = $request->file('treatment');

            // Gabungkan nama file dengan judul proyek film
            $treatmentFileName = $judulProyekFilm . '_treatment.' . $treatment->getClientOriginalExtension();

            // Simpan file treatment ke dalam direktori yang diinginkan (foto/admin/pdf1)
            $treatment->move(public_path('foto/admin/pdf1/'), $treatmentFileName);

            // Menyimpan nama file baru ke dalam array validatedData
            $validatedData['treatment'] = $treatmentFileName;
        }

        if ($request->hasFile('cv_filmography')) {
            // Ambil file cv_filmography dari request
            $cv_filmography = $request->file('cv_filmography');

            // Gabungkan nama file dengan judul proyek film
            $cvFilmographyFileName = $judulProyekFilm . '_cv_filmography.' . $cv_filmography->getClientOriginalExtension();

            // Simpan file cv_filmography ke dalam direktori yang diinginkan (foto/admin/pdf2)
            $cv_filmography->move(public_path('foto/admin/pdf2/'), $cvFilmographyFileName);

            // Menyimpan nama file baru ke dalam array validatedData
            $validatedData['cv_filmography'] = $cvFilmographyFileName;
        }

        // Membuat formulir1 dengan data yang telah divalidasi
        Formulir1::create($validatedData);

        return redirect('/')->with('formulir1', 'Data Formulir KFK Film Lab 2024 berhasil dimasukkan.');
    }

    public function formulir2(Request $request)
    {
        // Validasi data yang diterima dari form dengan pesan kesalahan khusus
        $validatedData = $request->validate([
            'judul_film' => 'required|string|max:255',
            'nama_lengkap_sutradara' => 'required|string|max:255',
            'kategori_film' => 'required|string|max:255',
            'tahun_produksi' => 'required|integer',
            'komunitas_rumah_produksi' => 'required|string|max:255',
            'logline' => 'required|string',
            'sinopsis_pendek' => 'required|string',
            'sinopsis_panjang' => 'required|string',
            'kontak_whatsapp' => 'required|string|max:20',
            'media_sosial_sutradara' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ], [
            'judul_film.required' => 'Judul Film tidak boleh kosong.',
            'nama_lengkap_sutradara.required' => 'Nama Lengkap Sutradara tidak boleh kosong.',
        ]);

        // Membuat formulir2 dengan data yang telah divalidasi
        Formulir2::create($validatedData);

        return redirect('/')->with('formulir2', 'Data Formulir Kompetisi Film F3 2024 berhasil di masukan Telah ditambahkan');
    }
}
