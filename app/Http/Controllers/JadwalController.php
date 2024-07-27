<?php

namespace App\Http\Controllers;

use App\Models\Jadwal; // Pastikan Anda sudah membuat model Jadwal
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', [
            'title' => 'Jadwal',
            'jadwal' => $jadwal,
        ]);
    }

    public function tampil()
    {
        $jadwal = Jadwal::all(); // Asumsi Anda memiliki model Jadwal
        return view('user.jadwal', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.add', [
            'title' => 'Tambah Jadwal',
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
        'rundown' => 'required|string',
        'jam_mulai' => 'required|string',
        'jam_selesai' => 'required|string',
            'tanggal' => 'required|date',
    ]);

    Jadwal::create($validatedData);

    return redirect()->route('jadwal.index')->with('pesan', 'Jadwal berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.show', [
            'title' => 'Detail Jadwal',
            'jadwal' => $jadwal,
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
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', [
            'title' => 'Edit Jadwal',
            'jadwal' => $jadwal,
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
        'rundown' => 'required|string',
        'jam_mulai' => 'required|string',
        'jam_selesai' => 'required|string',
        'tanggal' => 'required|date',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->update($validatedData);

    return redirect()->route('jadwal.index')->with('pesan', 'Jadwal berhasil diperbarui');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('pesan', 'Jadwal berhasil dihapus');
    }
}
