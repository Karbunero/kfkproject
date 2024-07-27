<?php

namespace App\Http\Controllers;

use App\Models\Baomong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BaomongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baomong = Baomong::all();
        return view('admin.baomong.index', [
            'title' => 'Baomong Film',
            'baomong' => $baomong,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baomong.add', [
            'title' => 'Tambah Baomong Film',
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
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/bakumpul)
            $foto->move(public_path('foto/baomong'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat baomong dengan data yang telah divalidasi
        Baomong::create($validatedData);

        return redirect('/admin/baomong')->with('pesan', 'Data Baomong Film Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $baomong = Baomong::all();

    return view('user.program.baomong_film', compact('baomong'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baomong = Baomong::findOrFail($id);
        return view('admin.baomong.edit', [
            'title' => 'Edit Baomong Film',
            'baomong' => $baomong,
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

        $baomong = Baomong::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($baomong->foto) {
                $fotoPath = public_path('foto/baomong/' . $baomong->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/baomong)
            $foto->move(public_path('foto/baomong'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data baomong dengan data yang telah divalidasi
        $baomong->update($validatedData);

        return redirect('/admin/baomong')->with('pesan', 'Data Baomong Film Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baomong = Baomong::findOrFail($id);

        // Hapus file foto jika ada
        if ($baomong->foto) {
            $fotoPath = public_path('foto/baomong/' . $baomong->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Hapus data baomong dari database
        $baomong->delete();

        return redirect('/admin/baomong')->with('pesan', 'Data Baomong Film Telah dihapus');
    }
}
