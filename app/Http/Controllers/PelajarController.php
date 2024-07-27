<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDO;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pelajar.index', [
            'title' => 'Kompetisi Film Pelajar NTT',
            'pelajar' => Pelajar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelajar.add', [
            'title' => 'Tambah Data Pelajar',
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', // max 10MB
            'kalimat' => 'required|string|max:10000',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $timestamp = now()->timestamp;
            $randomString = \Illuminate\Support\Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/pelajar'), $encryptedFileName);
            $validatedData['foto'] = $encryptedFileName;
        }

        Pelajar::create($validatedData);

        return redirect()->route('pelajar.index')->with('pesan', 'Data Pelajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajar = Pelajar::findOrFail($id);

        return view('admin.pelajar.edit', [
            'title' => 'Edit Data Pelajar',
            'pelajar' => $pelajar,
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000', // max 10MB
            'kalimat' => 'required|string|max:10000',
            'tanggal' => 'required|date',
        ]);

        $pelajar = Pelajar::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $timestamp = now()->timestamp;
            $randomString = \Illuminate\Support\Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/pelajar'), $encryptedFileName);
            // hapus foto lama jika ada
            if ($pelajar->foto) {
                $fotoPath = public_path('foto/pelajar/' . $pelajar->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            $validatedData['foto'] = $encryptedFileName;
        }

        $pelajar->update($validatedData);

        return redirect()->route('pelajar.index')->with('pesan', 'Data Pelajar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelajar = Pelajar::findOrFail($id);

        // hapus foto terkait
        if ($pelajar->foto) {
            $fotoPath = public_path('foto/pelajar/' . $pelajar->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $pelajar->delete();

        return redirect()->route('pelajar.index')->with('pesan', 'Data Pelajar berhasil dihapus');
    }
}
