@extends('layout.master')
@section('header')
    <h2>Kelola Akun dan Akses</h2>
@endsection
@section('title')
    
@endsection

@section('card-header')

    
@endsection
@section('card-body')
    <table border="0" class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>NIM</th>
                <th>Jenis Pengguna</th>
                <th>Prodi dan Kelas</th>
                <th>Nomor WA</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Afriansyah</td>
                <td>rrianafriansyah@gmail.com</td>
                <td>531424008</td>
                <td>Mahasiswa</td>
                <td>Sistem Informasi, Kelas A 24</td>
                <td>085242971471</td>
                <td>Aktif</td>
                <td>Hapus|Nonaktif</td>
            </tr>
        </tbody>
    </table>
@endsection
