<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Daftar Buku</h1>
        <div>
            <a href="/books/create" class="btn btn-primary">+ Tambah Buku</a>
            <a href="/categories" class="btn btn-primary" style="background: #10b981;">Kategori</a>
            <a href="/transactions" class="btn btn-primary" style="background: #f59e0b;">Transaksi</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="btn logout">Keluar</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($books->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $index => $book)
                    <tr>
                        <td>{{ ($books->currentPage() - 1) * $books->perPage() + $index + 1 }}</td>
                        <td>
                            @if($book->image)
                                <img src="/{{ $book->image }}" alt="{{ $book->title }}" style="width: 50px; height: 70px; object-fit: cover; border-radius: 4px;">
                            @else
                                <div style="width: 50px; height: 70px; background: #e5e7eb; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #9ca3af;">Tidak ada</div>
                            @endif
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>{{ $book->category->name ?? '-' }}</td>
                        <td>
                            <div class="actions">
                                <a href="/books/{{ $book->id }}/edit" class="btn btn-warning">Edit</a>
                                <form method="POST" action="/books/{{ $book->id }}" style="display: inline;">
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
            {{ $books->links() }}
        </div>
    @else
        <div class="empty">
            <p>Belum ada buku. <a href="/books/create" style="color: #2563eb;">Tambah buku sekarang</a></p>
        </div>
    @endif
</div>
</body>
</html>
