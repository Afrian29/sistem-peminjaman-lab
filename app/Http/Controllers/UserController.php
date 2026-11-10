<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function dashboard(){
        $roleAktif = 'pengguna';
        return view('user.beranda', ['role' => $roleAktif]);
    } 
}
