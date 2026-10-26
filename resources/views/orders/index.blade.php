<!DOCTYPE html>
<html>
<head>
    <title>Daftar Order</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    @include('partials.menu-buttons')

    <h1>Daftar Order</h1>
    <p><a href="{{ route('products.index') }}">Kembali ke Produk</a></p>

    <table>
        <tr><th>No</th><th>Pelanggan</th><th>Total</th><th>Tanggal</th><th>Aksi</th></tr>
        @foreach($orders as $o)
        <tr>
            <td>{{ $o->id }}</td>
            <td>{{ $o->customer->name ?? '-' }}</td>
            <td>Rp {{ number_format($o->total_amount, 0, ',', '.') }}</td>
            <td>{{ $o->created_at->format('d/m/Y') }}</td>
            <td><a href="{{ route('orders.invoice', $o) }}">Unduh Invoice PDF</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>