<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // public function akun(){
    //     $roleAktif ='admin';
    //     return view('admin.akun',['role' => $roleAktif]);
    // } 
    public function semuaAkun(){
        $akun = User::select('*')->get();
        $akundeleted =User::onlyTrashed()->get();
        return view('admin.akun',compact('akun','akundeleted'));
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
    public function restore($nim_nip){
        $user = User::onlyTrashed()->where('nim_nip', $nim_nip)->first();
        if(!$user){
            return redirect()->route('admin.akun')->with('error','Gagal Melakukan Pemulihan Akun');
        }
        $user->restore();
        return redirect()->route('admin.akun')->with('success','Berhasil Memulihkan akun');
    }
    public function edit($nim_nip){
        $akun = User::get();
        $akundeleted = User::onlyTrashed()->get();
        $editUser = User::where('nim_nip', $nim_nip)->first();
        return view('admin.akun', compact('akun', 'akundeleted', 'editUser'));
    }
    public function update(Request $request, $nim_nip){
        $user = User::where('nim_nip', $nim_nip)->first();
        $data = $request->validate([
            'nim_nip' =>
            [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'nim_nip')->ignore($user->id),
            ],
            'name' => 'required|string|max:100',
            'email'=>
            [
                'required',
                'email',
                'max:100',
                Rule::unique('users', 'email',)->ignore($user->id),
            ],
            'no_wa'=> 'required|numeric|digits_between:10,15',
            'kelas_jurusan' => 'required|string|max:100',
        ]);
        $user->update($data);
        return redirect()->route('admin.akun')->with('success','Akun berhasil diperbarui');
    }
}