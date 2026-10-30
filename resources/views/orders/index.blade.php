<!DOCTYPE html>
<html>
<head>
    <title>Daftar Order</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('partials.menu-buttons')

    <h1>Daftar Order</h1>

    @if(session('success'))
        <div style="background:#d4edda; padding:8px; margin-bottom:15px;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" style="margin-bottom:15px; display:flex; gap:8px; align-items:center;">
        @csrf
        <select name="product_id">
            @foreach($products as $p)
                <option value="{{ $p->id }}">{{ $p->name }} - Rp {{ number_format($p->price, 0, ',', '.') }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity" value="1" min="1" style="width:70px;">
        <button type="submit">Buat Order</button>
    </form>
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

    @include('partials.order-notification')
</body>
</html>