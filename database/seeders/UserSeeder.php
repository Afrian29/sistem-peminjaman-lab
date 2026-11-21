<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole     = Role::where('nama_role', 'Admin')->first();
        $aslabRole     = Role::where('nama_role', 'Asisten Lab')->first();
        $mahasiswaRole = Role::where('nama_role', 'Mahasiswa')->first();

        $ikhsan = User::updateOrCreate(
            ['email' => 'ikhsan@gmail.com'],
            [
                'nim_nip'       => '531424016',
                'name'          => 'Ikhsan',
                'password'      => Hash::make('password'),
                'no_wa'         => '081234567891',
                'kelas_jurusan' => 'SI A / Informatika',
                'role'          => 'Admin',
            ]
        );
        $ikhsan->roles()->sync([$adminRole->id, $aslabRole->id, $mahasiswaRole->id]);

        $saif = User::updateOrCreate(
            ['email' => 'saif@gmail.com'],
            [
                'nim_nip'       => '531424011',
                'name'          => 'Saif',
                'password'      => Hash::make('password'),
                'no_wa'         => '081234567892',
                'kelas_jurusan' => 'SI A / Informatika',
                'role'          => 'Asisten Lab',
            ]
        );
        $saif->roles()->sync([$aslabRole->id, $mahasiswaRole->id]);

        $rian = User::updateOrCreate(
            ['email' => 'rian@gmail.com'],
            [
                'nim_nip'       => '531424069',
                'name'          => 'Rian',
                'password'      => Hash::make('password'),
                'no_wa'         => '081234567893',
                'kelas_jurusan' => 'SI A / Informatika',
                'role'          => 'Mahasiswa',
            ]
        );
        $rian->roles()->sync([$mahasiswaRole->id]);
    }
}