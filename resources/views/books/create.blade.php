<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small">
    <h2>Tambah Buku Baru</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/books" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required>
        </div>

        <div class="form-group">
            <label for="year">Tahun Terbit</label>
            <input type="date" id="year" name="year" value="{{ old('year') }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stok</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select id="category_id" name="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/books" class="btn btn-secondary" style="text-decoration: none;">Batal</a>
        </div>
    </form>
</div>
</body>
</html>
