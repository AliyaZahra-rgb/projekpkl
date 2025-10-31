<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
      $data = [
        'name' => $request->name,
        'karyawan_id' => $request->karyawan_id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'karyawan',
    ];

     // hash password dan set role
    $data['password'] = Hash::make($data['password']);
    $data['role'] = 'karyawan';

    // simpan user
    User::create($data);

    // redirect dengan pesan sukses
    return redirect()->route('karyawan.index')->with('success', 'Register berhasil, silakan login.');
}


    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
        'name' => 'required',
        'karyawan_id' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt([
        'name' => $credentials['name'],
        'karyawan_id' => $credentials['karyawan_id'],
        'password' => $credentials['password']
    ])) {
        $request->session()->regenerate();
        return redirect()->route('karyawa'); // <-- pastikan route ini ada
    }

    return back()->withErrors([
        'login' => 'Kombinasi data login salah.',
    ]);
        
}
}