<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small">
    <h2>Edit Kategori</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required autofocus>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/categories" class="btn btn-secondary" style="text-decoration: none;">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
