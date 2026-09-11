<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk Toko</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Barang toko desudesu</h2>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['sku'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>{{ $item['stok'] }}</td>
                <td><img src="{{ asset('images/produk/' . $item['foto']) }}" alt="Foto {{ $item['nama'] }}" class="img-produk"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>