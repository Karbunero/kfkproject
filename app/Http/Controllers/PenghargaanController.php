<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penghargaan.index', [
            'title' => 'Penghargaan',
            'penghargaan' => Penghargaan::all(),
        ]);
    }
    public function tampil()
    {
    $penghargaan = Penghargaan::all(); // Asumsi Anda memiliki model Penghargaan

    return view('user.penghargaan', compact('penghargaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penghargaan.add', [
            'title' => 'Tambah Penghargaan',
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
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'bio' => 'required|string|max:10000',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/penghargaan'), $encryptedFileName);
            $validatedData['foto'] = $encryptedFileName;
        }

        Penghargaan::create($validatedData);

        return redirect()->route('penghargaan.index')->with('pesan', 'Penghargaan telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);

        return view('admin.penghargaan.show', [
            'title' => 'Detail Penghargaan',
            'penghargaan' => $penghargaan,
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
        $penghargaan = Penghargaan::findOrFail($id);

        return view('admin.penghargaan.edit', [
            'title' => 'Edit Penghargaan',
            'penghargaan' => $penghargaan,
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'bio' => 'required|string|max:10000',
        ]);

        $penghargaan = Penghargaan::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($penghargaan->foto) {
                $oldFotoPath = public_path('foto/penghargaan/' . $penghargaan->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            $foto = $request->file('foto');
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/penghargaan'), $encryptedFileName);
            $validatedData['foto'] = $encryptedFileName;
        }

        $penghargaan->update($validatedData);

        return redirect()->route('penghargaan.index')->with('pesan', 'Penghargaan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);

        if ($penghargaan->foto) {
            $fotoPath = public_path('foto/penghargaan/' . $penghargaan->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $penghargaan->delete();

        return redirect()->route('penghargaan.index')->with('pesan', 'Penghargaan telah dihapus');
    }
}
