<?php

namespace App\Http\Controllers;

use App\Models\Bakumpul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BakumpulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bakumpul.index', [
            'title' => 'Bakumpul Komunitas',
            'bakumpul' => Bakumpul::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bakumpul.add', [
            'title' => 'Tambah Data'
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000', // Maksimum 10 MB
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
            $foto->move(public_path('foto/bakumpul'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat bakumpul dengan data yang telah divalidasi
        Bakumpul::create($validatedData);

        return redirect('/admin/bakumpul')->with('pesan', 'Data Bakumpul Telah ditambahkan');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $bakumpul = Bakumpul::all();

    return view('user.program.bakumpul_komunitas', compact('bakumpul'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bakumpul = Bakumpul::findOrFail($id);

        return view('admin.bakumpul.edit', [
            'title' => 'Edit Data Bakumpul',
            'bakumpul' => $bakumpul
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:9048', // Validasi untuk file foto
            'kalimat' => 'required|string|max:10000',
            'tanggal' => 'required|date'
        ]);

        $bakumpul = Bakumpul::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Ambil file foto dari request
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($bakumpul->foto) {
                $fotoPath = public_path('foto/bakumpul/' . $bakumpul->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Enkripsi nama file gambar baru
            $encryptedFileName = hash('sha256', $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (foto/bakumpul)
            $foto->move(public_path('foto/bakumpul'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data bakumpul dengan data yang telah divalidasi
        $bakumpul->update($validatedData);

        return redirect('/admin/bakumpul')->with('pesan', 'Data Bakumpul Telah diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bakumpul = Bakumpul::findOrFail($id);

        // Hapus file gambar dari penyimpanan jika ada
        if ($bakumpul->foto) {
            $fotoPath = public_path('foto/bakumpul/' . $bakumpul->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Hapus data Bakumpul dari database
        $bakumpul->delete();

        return redirect('/admin/bakumpul')->with('pesan', 'Data Bakumpul Telah dihapus');
    }
}
