<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Transaksi - Toko Buku</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container container-small">
    <h2>Buat Transaksi Baru</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="info">
        Saat transaksi dibuat, stok buku akan otomatis berkurang sesuai jumlah yang dijual.
    </div>

    <form method="POST" action="/transactions">
        @csrf
        <div class="form-group">
            <label for="book_id">Pilih Buku</label>
            <select id="book_id" name="book_id" required onchange="updateBookInfo()">
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" data-stock="{{ $book->stock }}" data-price="{{ $book->id }}">
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
            <div id="book-info" class="book-info" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah Terjual</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="total_price">Total Harga (Rp)</label>
            <input type="number" id="total_price" name="total_price" value="{{ old('total_price') }}" min="0" step="1000" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="/transactions" class="btn btn-secondary" style="text-decoration: none;">Batal</a>
        </div>
    </form>

    <script>
        function updateBookInfo() {
            const select = document.getElementById('book_id');
            const selectedOption = select.options[select.selectedIndex];
            const stock = selectedOption.getAttribute('data-stock');
            const bookInfo = document.getElementById('book-info');
            
            if (select.value) {
                bookInfo.innerHTML = `📦 Stok tersedia: <strong>${stock}</strong> unit`;
                bookInfo.style.display = 'block';
            } else {
                bookInfo.style.display = 'none';
            }
        }
    </script>
</div>
</body>
</html>
