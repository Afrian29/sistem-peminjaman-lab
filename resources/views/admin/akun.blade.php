@extends('layout.master')
@section('header')
    <h2>Kelola Akun dan Akses</h2>
@endsection
@section('title')
    
@endsection

@section('card-header')

    
@endsection
@section('card-body')
<div class="border rounded-3 overflow-auto">
    <table border="0" class="table table-striped mb-0">
        <thead style="font-weight: bold;">
            <tr>
                <th scope="row">Nama</th>
                <th scope="row">Email</th>
                <th scope="row">NIM</th>
                <th scope="row">Jenis Pengguna</th>
                <th scope="row">Prodi dan Kelas</th>
                <th scope="row">Nomor WA</th>
                <th scope="row" style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($akun as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nim_nip}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->kelas_jurusan}}</td>
                <td>{{$user->no_wa}}</td>
                <td style="text-align: center;"><a href="{{ url('/delete/'.$user->nim_nip) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                <a href="{{ url('/update/'.$user->nim_nip) }}"><button type="button" class="btn btn-info">Update</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
