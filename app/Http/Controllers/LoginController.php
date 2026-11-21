<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $roleAwal = $request->user()->roles->first()?->nama_role;

        if (!$roleAwal) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->withErrors(['credential' => 'Anda Belum Punya Role!']);
        }
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

    //lupa password
    public function lupaForm()
    {
        return view('auth.lupa-password');
    }

    public function lupaSubmit(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email salah',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar'])->onlyInput('email');
        }

        $user->update(['password' => $data['password']]);

        return redirect('/login')->with('succes', 'Password anda berhasil diubah!');
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
