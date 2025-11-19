<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small">
    <h2>Detail Transaksi #{{ $transaction->id }}</h2>

    <div class="detail-group">
        <div class="label">Nama Buku</div>
        <div class="value">{{ $transaction->book->title }}</div>
    </div>

    <div class="detail-group">
        <div class="label">Penulis</div>
        <div class="value">{{ $transaction->book->author }}</div>
    </div>

    <div class="detail-group">
        <div class="label">Kategori</div>
        <div class="value">{{ $transaction->book->category->name ?? '-' }}</div>
    </div>

    <div class="detail-group">
        <div class="label">Jumlah Terjual</div>
        <div class="value">{{ $transaction->quantity }} unit</div>
    </div>

    <div class="detail-group">
        <div class="label">Total Harga</div>
        <div class="price">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</div>
    </div>

    <div class="detail-group">
        <div class="label">Tanggal Transaksi</div>
        <div class="value">{{ $transaction->created_at->format('d/m/Y H:i:s') }}</div>
    </div>

    <div class="button-group">
        <a href="/transactions" class="btn btn-secondary">← Kembali</a>
        <form method="POST" action="/transactions/{{ $transaction->id }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus? Stok akan dikembalikan.')">Hapus Transaksi</button>
        </form>
    </div>
</div>
</body>
</html>
