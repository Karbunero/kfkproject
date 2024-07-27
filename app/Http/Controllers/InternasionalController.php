<?php

namespace App\Http\Controllers;

use App\Models\Internasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class InternasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internasional = Internasional::all();

        return view('admin.internasional.index', [
            'title' => 'Layar Internasional',
            'internasional' => $internasional,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.internasional.add', [
            'title' => 'Tambah Data Internasional',
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

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/internasional)
            $foto->move(public_path('foto/internasional'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        Internasional::create($validatedData);

        return redirect('/admin/internasional')->with('pesan', 'Data Internasional berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $internasional = Internasional::all();

    return view('user.program.layar_internasional', compact('internasional'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internasional = Internasional::findOrFail($id);

        return view('admin.internasional.edit', [
            'title' => 'Edit Data Internasional',
            'internasional' => $internasional,
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

        $internasional = Internasional::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($internasional->foto) {
                $fotoPath = public_path('foto/internasional/' . $internasional->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/internasional)
            $foto->move(public_path('foto/internasional'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data internasional dengan data yang telah divalidasi
        $internasional->update($validatedData);

        return redirect('/admin/internasional')->with('pesan', 'Data Internasional berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internasional = Internasional::findOrFail($id);

        // Hapus foto terkait
        if (file_exists(public_path('foto/internasional/' . $internasional->foto))) {
            unlink(public_path('foto/internasional/' . $internasional->foto));
        }

        $internasional->delete();

        return redirect('/admin/internasional')->with('pesan', 'Data Internasional berhasil dihapus');
    }
}
