<?php

namespace App\Http\Controllers;

use App\Models\KFK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KFKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kfk = KFK::all();

        return view('admin.kfk.index', [
            'title' => 'KFK Film Lab',
            'kfk' => $kfk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kfk.add', [
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

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/kfk)
            $foto->move(public_path('foto/kfk'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat KFK dengan data yang telah divalidasi
        KFK::create($validatedData);

        return redirect('/admin/kfk')->with('pesan', 'Data KFK Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $kfk = KFK::all();

    return view('user.program.kfk_film_lab', compact('kfk'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kfk = KFK::findOrFail($id);

        return view('admin.kfk.edit', [
            'title' => 'Edit Data',
            'kfk' => $kfk,
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

        $kfk = KFK::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($kfk->foto) {
                $fotoPath = public_path('foto/kfk/' . $kfk->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/kfk)
            $foto->move(public_path('foto/kfk'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data KFK dengan data yang telah divalidasi
        $kfk->update($validatedData);

        return redirect('/admin/kfk')->with('pesan', 'Data KFK Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kfk = KFK::findOrFail($id);

        // Hapus foto terkait
        if (file_exists(public_path('foto/kfk/' . $kfk->foto))) {
            unlink(public_path('foto/kfk/' . $kfk->foto));
        }

        $kfk->delete();

        return redirect('/admin/kfk')->with('pesan', 'KFK berhasil dihapus');
    }
}
