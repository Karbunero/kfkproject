<?php

namespace App\Http\Controllers;

use App\Models\Layar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layar = Layar::all();

        return view('admin.layar.index', [
            'title' => 'Layar Nusantara',
            'layar' => $layar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layar.add', [
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
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

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/layar)
            $foto->move(public_path('foto/layar'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat layar dengan data yang telah divalidasi
        Layar::create($validatedData);

        return redirect('/admin/layar')->with('pesan', 'Data Layar Nusantara Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $layar = Layar::all();

    return view('user.program.layar_nusantara', compact('layar'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layar = Layar::findOrFail($id);

        return view('admin.layar.edit', [
            'title' => 'Edit Data',
            'layar' => $layar,
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
            'kalimat' => 'required|string|max:10000',
            'tanggal' => 'required|date',
        ]);

        $layar = Layar::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($layar->foto) {
                $fotoPath = public_path('foto/layar/' . $layar->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/layar)
            $foto->move(public_path('foto/layar'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data layar dengan data yang telah divalidasi
        $layar->update($validatedData);

        return redirect('/admin/layar')->with('pesan', 'Data Layar Nusantara Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layar = Layar::findOrFail($id);

        // Hapus foto terkait
        if (file_exists(public_path('foto/layar/' . $layar->foto))) {
            unlink(public_path('foto/layar/' . $layar->foto));
        }

        $layar->delete();

        return redirect('/admin/layar')->with('pesan', 'Layar Nusantara berhasil dihapus');
    }
}
