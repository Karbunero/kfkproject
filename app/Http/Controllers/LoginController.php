<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use PDO;

class LoginController extends Controller
{
    public function login()
    {
        return View('admin.login');
    }
    public function loginadmin(Request $request)
    {
        // Validasi input form
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        // Attempt login untuk super admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session
            return redirect('admin/index');
        }


        // Jika tidak ada guard yang berhasil, kembalikan dengan pesan kesalahan
        return back()->withErrors([
            'email' => 'email atau Password yang Anda masukkan salah.',
        ]);
    }
    public function register()
    {
        return View('admin.register');
    }

    public function registeradmin(Request $request)
    {
        // Menghapus dd($request) agar skrip tidak berhenti di sini
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/login')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('logout', 'Terima kasih telah berkunjung.');
    }

}
