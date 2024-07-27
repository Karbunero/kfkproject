<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();

        return view('admin.film.index', [
            'title' => 'Film Pasiar',
            'film' => $films,
        ]);
    }

    public function tampil()
    {
    $film = Film::all(); // Asumsi Anda memiliki model Penghargaan

    return view('user.film', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.film.add', [
            'title' => 'Tambah Film',
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
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'sutradara' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'rating_usia' => 'required|string|max:255',
            'sinopsis' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/film'), $encryptedFileName);
            $validatedData['foto'] = $encryptedFileName;
        }

        Film::create($validatedData);

        return redirect('/admin/film')->with('pesan', 'Data Film Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::findOrFail($id);

        return view('admin.film.show', [
            'title' => 'Detail Film',
            'film' => $film,
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
        $film = Film::findOrFail($id);

        return view('admin.film.edit', [
            'title' => 'Edit Film',
            'film' => $film,
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
            'judul' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
            'sinopsis' => 'required|string',
            'sutradara' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'rating_usia' => 'required|string|max:255',
        ]);

        $film = Film::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            if ($film->foto) {
                $fotoPath = public_path('foto/film/' . $film->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $timestamp = now()->timestamp;
            $randomString = Str::random(10);
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto/film'), $encryptedFileName);
            $validatedData['foto'] = $encryptedFileName;
        }

        $film->update($validatedData);

        return redirect('/admin/film')->with('pesan', 'Data Film Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);

        if (file_exists(public_path('foto/film/' . $film->foto))) {
            unlink(public_path('foto/film/' . $film->foto));
        }

        $film->delete();

        return redirect('/admin/film')->with('pesan', 'Film berhasil dihapus');
    }
}
