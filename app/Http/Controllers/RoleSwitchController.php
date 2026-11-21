<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleSwitchController extends Controller
{
    public function switch(Request $request)
    {
        $targetRole = $request->input('role');
        $user = auth()->user();

        $isPrimaryRole = ($user->role === $targetRole); //untuk cek apakah user memang berhak memakai role atau entahlah sakit pala
        $hasPivotRole  = $user->roles()->where('nama_role', $targetRole)->exists();

        if (!$isPrimaryRole && !$hasPivotRole) {
            abort(403, 'Anda tidak memiliki hak akses untuk role ini.');
        }

        session(['active_role' => $targetRole]);

        return match ($targetRole) {
            'Asisten Lab' => redirect()->route('aslab.pengajuan'),
            'Admin'       => redirect()->route('admin.akun'),
            'Mahasiswa'   => redirect()->route('mahasiswa.beranda'),
            default       => redirect()->back(),
        };
    }
}