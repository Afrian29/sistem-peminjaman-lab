<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AslabController extends Controller
{
    public function pengajuan(){
        return view('aslab.pengajuan');
    }

    public function statuslab(){
        return view('aslab.status-lab');
    }

    public function jadwaltetap(){
        return view('aslab.jadwal-tetap');
    }

    public function RiwayatPeminjaman(){
        return view('aslab.rekap-peminjaman');
    }

    public function akun(){
        return view('aslab.akun');
    }

    public function lab(){
        return view('aslab.lab');
    }
}
