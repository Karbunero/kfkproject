<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KompetisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kompetisi.index', [
            'title' => 'Kompetisi Film',
            'kompetisi' => Kompetisi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kompetisi.add', [
            'title' => 'Tambah Data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', // sesuaikan dengan kebutuhan
            'kalimat' => 'required|string|max:10000', // maksimal 10.000 karakter
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/kompetisi)
            $foto->move(public_path('foto/kompetisi'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat kompetisi dengan data yang telah divalidasi
        Kompetisi::create($validatedData);

        return redirect('/admin/kompetisi')->with('pesan', 'Data Kompetisi Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $kompetisi = Kompetisi::all();

    return view('user.program.kompetisi_film_pelajar_ntt', compact('kompetisi'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kompetisi = Kompetisi::findOrFail($id);

        return view('admin.kompetisi.edit', [
            'title' => 'Edit Data',
            'kompetisi' => $kompetisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000', // Maksimum 10 MB
            'kalimat' => 'required|string|max:10000',
            'tanggal' => 'required|date',
        ]);

        $kompetisi = Kompetisi::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($kompetisi->foto) {
                $fotoPath = public_path('foto/kompetisi/' . $kompetisi->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/kompetisi)
            $foto->move(public_path('foto/kompetisi'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data kompetisi dengan data yang telah divalidasi
        $kompetisi->update($validatedData);

        return redirect('/admin/kompetisi')->with('pesan', 'Data Kompetisi Film Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetisi = Kompetisi::findOrFail($id);

        // Hapus foto terkait
        if (file_exists(public_path('foto/kompetisi/' . $kompetisi->foto))) {
            unlink(public_path('foto/kompetisi/' . $kompetisi->foto));
        }

        $kompetisi->delete();

        return redirect('/admin/kompetisi')->with('pesan', 'Kompetisi berhasil dihapus');
    }
}
