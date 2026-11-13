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
                <th>Role</th>
                <th>Program Studi</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rian</td>
                <td>rrianafriansyah@gmail.com</td>
                <td>531424008</td>
                <td>Kamen Rider Wizard</td>
                <td>Sistem Informasi</td>
                <td>Kelas A</td>
                <td>Aktif</td>
                <td>Hapus | Edit</td>
            </tr>
        </tbody>
    </table>
@endsection
