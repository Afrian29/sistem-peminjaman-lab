<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function akun(){
    //     $roleAktif ='admin';
    //     return view('admin.akun',['role' => $roleAktif]);
    // } 
    public function semuaAkun(){
        $akun = User::select('*')->get();
        $roleAktif = 'admin';
        return view('admin.akun',compact('akun'),['role' => $roleAktif]);
    }
    public function delete($nim_nip){
        $dataUser = User::where('nim_nip', $nim_nip)->first();
        if(!$dataUser){
            $status = 'error';
            $message = "Gagal menghapus user";
        }else{
            $dataUser->delete();
            $status ='success';
            $message = "Data Berhasil di Hapus";
        }
    }
    public function riwayat(){
        $roleAktif = 'admin';
        return view('admin.riwayat',['role' => $roleAktif]);
    }
    public function statuslab(){
        $roleAktif = 'admin';
        return view('admin.statuslab',['role' => $roleAktif]);
    }
    public function notifikasi(){
        $roleAktif = 'admin';
        return view('admin.notifikasi',['role' => $roleAktif]);
    }
}
