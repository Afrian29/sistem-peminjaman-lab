<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.beranda', ['role' => $roleAktif]);
    } 

    public function riwayat(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.riwayat', ['role' => $roleAktif]);
    } 

    public function statusLab(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.status-lab', ['role' => $roleAktif]);
    } 

    public function notifikasi(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.notifikasi', ['role' => $roleAktif]);
    } 

    public function akun(){
        $roleAktif = 'pengguna';
        return view('mahasiswa.akun', ['role' => $roleAktif]);
    } 
}