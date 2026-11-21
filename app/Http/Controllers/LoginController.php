<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['credentials' => 'Email atau Password salah!'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $roleAwal = $request->user()->role;
        session(['active_role' => $roleAwal]);
        return redirect()->intended($this->homeFor($roleAwal));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function homeFor(?string $role): string
    {
        return match ($role) {
            'Asisten Lab' => route('aslab.pengajuan'),
            'Admin' => route('admin.akun'),
            'Mahasiswa' => route('mahasiswa.beranda'),
            default => route('login'),
        };
    }
}
