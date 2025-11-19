<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Daftar Transaksi</h1>
        <div>
            <a href="/transactions/create" class="btn btn-primary">+ Buat Transaksi</a>
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

    @if($transactions->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $index => $transaction)
                    <tr>
                        <td>{{ ($transactions->currentPage() - 1) * $transactions->perPage() + $index + 1 }}</td>
                        <td>{{ $transaction->book->title ?? '-' }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td class="price">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="actions">
                                <a href="/transactions/{{ $transaction->id }}" class="btn btn-primary" style="background: #3b82f6;">Lihat</a>
                                <form method="POST" action="/transactions/{{ $transaction->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus? Stok akan dikembalikan.')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            {{ $transactions->links() }}
        </div>
    @else
        <div class="empty">
            <p>Belum ada transaksi. <a href="/transactions/create" style="color: #2563eb;">Buat transaksi sekarang</a></p>
        </div>
    @endif
</div>
</body>
</html>
