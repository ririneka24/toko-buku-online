<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css"
>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Daftar Kategori</h1>
        <div>
            <a href="/categories/create" class="btn btn-primary">+ Tambah Kategori</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="btn logout">Keluar</button>
            </form>
        </div>
    </div>

    <div class="nav-links">
        <a href="/books">← Kembali ke Buku</a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($categories->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->books->count() }}</td>
                        <td>
                            <div class="actions">
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Edit</a>
                                <form method="POST" action="/categories/{{ $category->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            {{ $categories->links() }}
        </div>
    @else
        <div class="empty">
            <p>Belum ada kategori. <a href="/categories/create" style="color: #2563eb;">Tambah kategori sekarang</a></p>
        </div>
    @endif
</div>
</body>
</html>
