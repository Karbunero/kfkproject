<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', [
            'title' => 'Daftar Artikel',
            'artikel' => $artikel
        ]);
    }

    public function tampil()
{
    $artikels = Artikel::paginate(10); // Mengambil 10 artikel per halaman

    return view('user.media', [
        'artikels' => $artikels
    ]);
}

    public function create()
    {
        return view('admin.artikel.add', [
            'title' => 'Tambah Artikel'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'penulis' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'kalimat' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        try {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $encryptedFileName = uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('foto/artikel'), $encryptedFileName);
                $validatedData['foto'] = $encryptedFileName;
            }

            Artikel::create($validatedData);
            return redirect('/admin/artikel')->with('pesan', 'Artikel telah ditambahkan');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan artikel.')->withInput();
        }
    }

    public function show($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return view('user.show', ['error' => 'Artikel tidak ditemukan.']);
        }

        return view('user.show', compact('artikel'));
    }

    public function edit($id)
    {
    $artikel = Artikel::findOrFail($id);
    $artikel->tanggal = \Carbon\Carbon::parse($artikel->tanggal); // Pastikan tanggal adalah objek Carbon

    return view('admin.artikel.edit', [
        'title' => 'Edit Artikel',
        'artikel' => $artikel,
    ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'penulis' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'kalimat' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        try {
            $artikel = Artikel::findOrFail($id);

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                if ($artikel->foto) {
                    $oldFotoPath = public_path('foto/artikel/' . $artikel->foto);
                    if (file_exists($oldFotoPath)) {
                        unlink($oldFotoPath);
                    }
                }
                $encryptedFileName = uniqid() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('foto/artikel'), $encryptedFileName);
                $validatedData['foto'] = $encryptedFileName;
            }

            $artikel->update($validatedData);
            return redirect('/admin/artikel')->with('pesan', 'Artikel telah diperbarui');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui artikel.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $artikel = Artikel::findOrFail($id);

            if ($artikel->foto) {
                $fotoPath = public_path('foto/artikel/' . $artikel->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $artikel->delete();
            return redirect('/admin/artikel')->with('pesan', 'Artikel telah dihapus');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus artikel.');
        }
    }
}
