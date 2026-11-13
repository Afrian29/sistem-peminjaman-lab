<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">    
    <title>Register</title>
</head>
<body>
    <div class="">
        @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <strong>Registrasi Gagal:</strong> Tolong periksa kembali inputan Anda
            {{ $errors }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ url('/register') }}" method="post">
            @csrf
            <label for="name">Nama</label>
            <input type="text" name="name" id="name"><br>

            <label for="nim_nip">NIM</label>
            <input type="text" name="nim_nip" id="nim_nip"><br>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email"><br>
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"><br>
            <label for="no_wa">Nomor WA</label>
            <input type="tel" name="no_wa" id="no_wa"><br>

            <label for="kelas_jurusan">Kelas dan Jurusan</label>
            <input type="text" name="kelas_jurusan" id="kelas_jurusan"><br>

            <label for="role">Jenis Pengguna</label>
            <select name="role" id="role">
                <option value="" disabled>Pilih</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="aslab">Asisten Lab</option>
            </select><br>
            <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>