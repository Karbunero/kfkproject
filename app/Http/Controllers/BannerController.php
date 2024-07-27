<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.banner.index', [
            'title' => 'Banner',
            'banner' => Banner::all(),
            $banner = Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add', [
            'title' => 'Tambah banner'
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
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10000', // Menambahkan validasi untuk file foto
    ]);

    if ($request->hasFile('foto')) {
        // Ambil file foto dari request
        $foto = $request->file('foto');
        
        // Enkripsi nama file gambar baru
        $encryptedFileName = hash('sha256', $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
        
        // Simpan file foto ke dalam direktori yang diinginkan (foto/banner)
        $foto->move(public_path('foto/banner'), $encryptedFileName);

        // Menyimpan nama file terenkripsi ke dalam array validatedData
        $validatedData['foto'] = $encryptedFileName;
    }

    // Membuat banner dengan data yang telah divalidasi
    Banner::create($validatedData);

    return redirect('/admin/banner')->with('pesan', 'Data Banner Telah ditambahkan');
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
        return view('admin.banner.edit', [
            'title' => 'Edit Data Banner',
            'banner' => Banner::find($id)
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:9048', // Menambahkan validasi untuk file foto
        ]);
    
        $banner = Banner::findOrFail($id);
    
           if ($request->hasFile('foto')) {
        // Ambil file foto dari request
        $foto = $request->file('foto');

         // Hapus file foto jika ada
        if ($banner->foto) {
            $fotoPath = public_path('foto/banner/' . $banner->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        
        // Enkripsi nama file gambar baru
        $encryptedFileName = hash('sha256', $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
        
        // Simpan file foto ke dalam direktori yang diinginkan (foto/banner)
        $foto->move(public_path('foto/banner'), $encryptedFileName);

        // Menyimpan nama file terenkripsi ke dalam array validatedData
        $validatedData['foto'] = $encryptedFileName;
    }
    
        // Update data banner dengan data yang telah divalidasi
        $banner->update($validatedData);
    
        return redirect('/admin/banner')->with('pesan', 'Data Banner Telah diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan banner berdasarkan ID
        $banner = Banner::findOrFail($id);
    
        // Hapus file foto jika ada
        if ($banner->foto) {
            $fotoPath = public_path('foto/banner/' . $banner->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
    
        // Hapus banner dari database
        $banner->delete();
    
        return redirect('/admin/banner')->with('pesan', 'Data Banner Telah dihapus');
    }
}
