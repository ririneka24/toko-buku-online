<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small" style="max-width: 400px; margin: 60px auto;">
    <h2>Daftar Akun Baru</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div>
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p style="font-size: 13px; color: #6b7280; text-align: center; margin-top: 12px;">Sudah punya akun? <a href="/login" style="color: #2563eb; text-decoration: none;">Masuk</a></p>
</div>
</body>
</html>
