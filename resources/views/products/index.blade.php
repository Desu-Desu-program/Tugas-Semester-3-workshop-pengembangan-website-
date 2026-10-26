<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .ok { background: #d4edda; padding: 8px; margin-bottom: 15px; }
    </style>
</head>
<body>
    @include('partials.menu-buttons')

    <h1>Daftar Produk</h1>

    @if(session('success'))
        <div class="ok">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('products.create') }}">+ Tambah Produk</a> | <a href="{{ route('orders.index') }}">Lihat Order</a></p>

    <table>
        <tr>
            <th>Gambar</th><th>Nama</th><th>SKU</th><th>Kategori</th><th>Harga</th><th>Stok</th>
        </tr>
        @foreach($products as $p)
        <tr>
            <td>
                @if($p->image)
                    <img src="{{ asset('storage/' . $p->image) }}" width="80">
                @else
                    -
                @endif
            </td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->category->name ?? '-' }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>{{ $p->stock }}</td>
        </tr>
        @endforeach
    </table>

    {{ $products->links() }}
</body>
</html>