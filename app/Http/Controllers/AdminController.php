<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDO;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function tampil()
    // {
    //     return View('admin.index', [
    //         'title' => 'Beranda',
    //     ]);
    // }

    public function tampil()
    {
        return View('admin.index', [
            'title' => 'Dashboard',
        ]);
    }

    public function index()
    {
        return View('admin.admin.index', [
            'title' => 'Admin',
            'admin' => Admin::all(),
            $admin = Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.add', [
            'title' => 'Tambah Data Admin'
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Admin::create($validatedData);

        return redirect('/admin/admin')->with('pesan', 'Data Admin Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return View('admin.program', [
            'title' => 'Program',
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
        return view('admin.admin.edit', [
            'title' => 'Edit Data Admin',
            'admin' => Admin::find($id)
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

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];


        $validateData['password'] = Hash::make($rules['password']);

        $validateData = $request->validate($rules);

        Admin::where('id', $id)->update($validateData);

        return redirect('/admin/admin')
            ->with('pesan', 'Data admin berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admin/admin')->with('pesan', 'Data berhasil di hapus');
    }
}
