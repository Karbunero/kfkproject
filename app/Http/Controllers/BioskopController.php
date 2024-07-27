<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bioskop = Bioskop::all();

        return view('admin.bioskop.index', [
            'title' => 'Bioskop Pasiar',
            'bioskop' => $bioskop,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bioskop.add', [
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

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/bioskop)
            $foto->move(public_path('foto/bioskop'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Membuat bioskop dengan data yang telah divalidasi
        Bioskop::create($validatedData);

        return redirect('/admin/bioskop')->with('pesan', 'Data Bioskop Telah ditambahkan');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show()
{
    $bioskop = Bioskop::all();

    return view('user.program.bioskop_pasiar', compact('bioskop'));
}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bioskop = Bioskop::findOrFail($id);

        return view('admin.bioskop.edit', [
            'title' => 'Edit Data',
            'bioskop' => $bioskop,
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

        $bioskop = Bioskop::findOrFail($id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Hapus file foto lama jika ada
            if ($bioskop->foto) {
                $fotoPath = public_path('foto/bioskop/' . $bioskop->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Mendapatkan timestamp dan string acak untuk membuat nama file unik
            $timestamp = now()->timestamp;
            $randomString = Str::random(10);

            // Enkripsi nama file gambar baru
            $encryptedFileName = $timestamp . '_' . $randomString . '.' . $foto->getClientOriginalExtension();

            // Simpan file foto ke dalam direktori yang diinginkan (public/foto/bioskop)
            $foto->move(public_path('foto/bioskop'), $encryptedFileName);

            // Menyimpan nama file terenkripsi ke dalam array validatedData
            $validatedData['foto'] = $encryptedFileName;
        }

        // Update data bioskop dengan data yang telah divalidasi
        $bioskop->update($validatedData);

        return redirect('/admin/bioskop')->with('pesan', 'Data bioskop Film Telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bioskop = Bioskop::findOrFail($id);

        // Hapus foto terkait
        if (file_exists(public_path('foto/bioskop/' . $bioskop->foto))) {
            unlink(public_path('foto/bioskop/' . $bioskop->foto));
        }

        $bioskop->delete();

        return redirect('/admin/bioskop')->with('pesan', 'Bioskop berhasil dihapus');
    }
}
