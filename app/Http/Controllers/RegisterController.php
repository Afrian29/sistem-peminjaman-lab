<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; 
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function form()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $dataMhs = $request->validate([
            'nim_nip'       => 'required|string|unique:users,nim_nip|max:50',
            'name'          => 'required|string|max:100',
            'email'         => 'required|string|email|unique:users,email|max:100',
            'password'      => 'required|string|min:8|confirmed', 
            'no_wa'         => 'required|numeric|digits_between:10,15',
            'kelas_jurusan' => 'required|string|max:100',
        ]);

        $user = User::create($dataMhs);

        $roleMahasiswa = Role::firstOrCreate(['nama_role' => 'Mahasiswa']);
        $user->roles()->attach($roleMahasiswa->id);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan masuk.');
    }
}
