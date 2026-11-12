<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AslabController extends Controller
{
    public function pengajuan(){
        $roleAktif = 'aslab';
        return view('aslab.pengajuan',['role' => $roleAktif]);
    }
}
