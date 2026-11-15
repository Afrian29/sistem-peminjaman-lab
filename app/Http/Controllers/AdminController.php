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
}
