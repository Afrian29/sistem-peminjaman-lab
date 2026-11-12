<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function beranda(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.beranda', ['role' => $roleAktif]);
    } 
}
