<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beranda = Beranda::all();
        return view('admin.beranda.index', [
            'title' => 'Beranda',
            'beranda' => $beranda,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.beranda.add', [
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', // Maksimum 10 MB
            'kalimat' => 'required|string|max:10000',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/beranda)
            $foto->move(public_path('foto/beranda'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat beranda dengan data yang telah divalidasi
        Beranda::create($validatedData);

        return redirect('/admin/beranda')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $beranda = Beranda::all(); // Retrieve all Beranda records

    return view('welcome', [
        'beranda' => $beranda, // Pass the data to the view
    ]);
}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beranda = Beranda::findOrFail($id);

        return view('admin.beranda.edit', [
            'title' => 'Edit Data',
            'beranda' => $beranda,
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
        ]);

        $beranda = Beranda::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($beranda->foto) {
                $fotoPath = public_path('foto/beranda/' . $beranda->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/beranda)
            $foto->move(public_path('foto/beranda'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data beranda dengan data yang telah divalidasi
        $beranda->update($validatedData);

        return redirect('/admin/beranda')->with('pesan', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beranda = Beranda::findOrFail($id);

        // Hapus file foto jika ada
        if ($beranda->foto) {
            $fotoPath = public_path('foto/beranda/' . $beranda->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Hapus data beranda dari database
        $beranda->delete();

        return redirect('/admin/beranda')->with('pesan', 'Data berhasil dihapus');
    }
}
