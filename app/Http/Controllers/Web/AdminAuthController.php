<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    // 🟦 Tampilkan form login
    public function showLogin()
    {
        return view('admin.login'); // pastikan file ini ada
    }

    // 🟩 Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'karyawan_id' => 'required',
            'name' => 'required',
        ]);

        $credentials = $request->only('email', 'password', 'karyawan_id', 'name');

        // Coba login pakai guard admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Data login tidak cocok.',
        ])->onlyInput('email', 'karyawan_id', 'name');
    }

    // 🟨 Tampilkan form register
    public function showRegister()
    {
        return view('admin.register'); // pastikan view-nya ada
    }

    // 🟧 Proses register admin baru
    public function register(Request $request)
    {$data = [
        'name' => $request->name,
        'karyawan_id' => $request->karyawan_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'admin',
    ];

     // hash password dan set role
    $data['password'] = Hash::make($data['password']);
    $data['role'] = 'admin';

    // simpan user
    Admin::create($data);

    // redirect dengan pesan sukses
    return redirect()->route('admin.admin')->with('success', 'Register berhasil, silakan login.');
}

}

