@extends('layout.master')
@section('header')
    <h2>Kelola Akun dan Akses</h2>
@endsection
@section('title')

@endsection

@section('card-header')
    <h1>Akun User</h1>
@endsection
@section('card-body')
<div class="border rounded-3 overflow-auto">
    <table border="0" class="table table-bordered text-center align-middle mb-0">
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
                <td><form method="POST" action="{{ route('admin.delete', ['nim_nip'=>$user->nim_nip])}}"
                    onsubmit="return confirm(@js('Yakin Ingin menghapus akun atas nama '.$user->name.'?'))">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    </form>
                <a href="{{ url('/update-user/'.$user->nim_nip) }}"><button type="button" class="btn btn-info"><i class="bi bi-pencil-square"></i></button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
    @endif
        @if (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
    @endif
@endsection
