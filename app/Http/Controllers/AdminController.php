<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function akun(){
        $roleAktif ='admin';
        return view('admin.akun',['role' => $roleAktif]);
    }
}
