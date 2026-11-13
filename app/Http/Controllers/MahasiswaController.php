<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda(){
        $roleAktif = 'mahasiswa';
        return view('mahasiswa.beranda', ['role' => $roleAktif]);
    } 

    public function riwayat(){
        $roleAktif = 'mahasiswa';
        return view('mahasiswa.riwayat', ['role' => $roleAktif]);
    } 

    public function statusLab(){
        $roleAktif = 'mahasiswa';
        return view('mahasiswa.status-lab', ['role' => $roleAktif]);
    } 

    public function notifikasi(){
        $roleAktif = 'mahasiswa';
        return view('mahasiswa.notifikasi', ['role' => $roleAktif]);
    } 

    public function akun(){
        $roleAktif = 'mahasiswa';
        return view('mahasiswa.akun', ['role' => $roleAktif]);
    } 
}

