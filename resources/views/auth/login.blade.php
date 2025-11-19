<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small">
    <h1>Masuk ke Toko Buku</h1>

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

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Masuk</button>
    </form>

    <p class="small">Belum punya akun? <a href="/register" style="color: #2563eb; text-decoration: none;">Daftar</a></p>
</div>
</body>
</html>
