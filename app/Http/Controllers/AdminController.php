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
        return view('admin.akun',compact('akun'));
    }
    public function delete($nim_nip){
        $dataUser = User::where('nim_nip', $nim_nip)->first();
        if(!$dataUser){
            return redirect ('admin.akun')->route('admin.akun')->with('error', 'Gagal Menghapus Akun');
        }else{
            $dataUser->delete();
            return redirect()->route('admin.akun')->with('success','Akun berhasil dihapus');
        }
    }
    public function riwayat(){
        return view('admin.riwayat');
    }
    public function statuslab(){
        return view('admin.statuslab');
    }
    public function notifikasi(){
        return view('admin.notifikasi');
    }
}