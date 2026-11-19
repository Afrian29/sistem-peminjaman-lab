<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Peminjaman Lab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="login">
        <div class="login-brand">
            <div>
                <p class="brand-name">Peminjaman Lab</p>
                <p class="brand-campus">Kampus 4 Universitas Negeri Gorontalo</p>
            </div>

            <div class="brand-mid">
                <p class="brand-headline">Peminjaman Lab Komputer tanpa antre di Ruangan Server</p>
                <p class="brand-copy">Ajukan sesuai jadwal tetap kelas atau di luar jadwal, pantau persetujuan Aslab,
                    dan catat pengambilan kunci dengan rapi.</p>
            </div>

            <p class="brand-foot">Sistem Informasi Peminjaman Lab Komputer</p>
            <p class="brand-tagline">Sistem Informasi Peminjaman Lab Komputer, Kampus 4 Universitas Negeri Gorontalo.
            </p>
        </div>

        <main class="login-form">
            <div class="login-card">
                <h1>Daftar Akun</h1>
                <p class="card-sub">Lengkapi data diri Anda di bawah ini</p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <span>ada yang tidak benar woi!</span>
                    </div>
                @endif

                <form method="POST" action="{{ url('/register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Nama Lengkap</label>
                        <input class="input" type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap" required autofocus>
                        @error('name')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="nim_nip">NIM / NIP</label>
                        <input class="input" type="text" id="nim_nip" name="nim_nip" value="{{ old('nim_nip') }}"
                            placeholder="Contoh: 531422001" required>
                        @error('nim_nip')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input class="input" type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="email@gmail.com" required>
                        @error('email')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="no_wa">Nomor WhatsApp</label>
                        <input class="input" type="tel" id="no_wa" name="no_wa" value="{{ old('no_wa') }}"
                            placeholder="08xxxxxxxxxx" required>
                        @error('no_wa')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="kelas_jurusan">Kelas dan Jurusan</label>
                        <input class="input" type="text" id="kelas_jurusan" name="kelas_jurusan"
                            value="{{ old('kelas_jurusan') }}" placeholder="Contoh: SI A / Informatika" required>
                        @error('kelas_jurusan')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="role">Role</label>
                        <select class="input" id="role" name="role" required>
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih Peran</option>
                            <option value="Mahasiswa" {{ old('role') === 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>                        </select>
                        @error('role')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="field-control">
                        <input class="input" type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                        @error('password')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                            <button class="field-toggle" type="button" id="toggle-password" aria-label="Tampilkan password" aria-pressed="false">
                                <i class="bi bi-eye icon-show"></i>
                                <i class="bi bi-eye-slash icon-hide"></i>
                            </button>
                        </div>
                    </div>

                    <div class="field">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="field-control">
                        <input class="input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                        <button class="field-toggle" type="button" id="toggle-password-confirmation" aria-label="Tampilkan password" aria-pressed="false">
                                <i class="bi bi-eye icon-show"></i>
                                <i class="bi bi-eye-slash icon-hide"></i>
                            </button>
                    </div>
                    </div>

                    <button class="btn-primary" type="submit">Daftar Sekarang</button>
                </form>
            </div>

            <div class="register-row">
                <span>Sudah punya akun?</span>
                <a class="link" href="{{ route('login') }}">Login di sini</a>
            </div>
        </main>
    </div>

    <script>
        function setupPasswordToggle(buttonId, inputId) {
            const toggleBtn = document.getElementById(buttonId);
            const passwordInput = document.getElementById(inputId);

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    this.classList.toggle('is-revealed', isPassword);

                    this.setAttribute('aria-pressed', isPassword ? 'true' : 'false');
                    this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan Password');
                });
            }
        }

        setupPasswordToggle('toggle-password', 'password');
        setupPasswordToggle('toggle-password-confirmation', 'password_confirmation');
    </script>
</body>

</html>