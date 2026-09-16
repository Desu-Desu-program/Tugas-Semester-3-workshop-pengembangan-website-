<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Laporan Penjualan</title>
</head>
<body>

    <h1>Rekap Penjualan: {{ $dataLaporan['bulan'] }}</h1>

    <div class="card">
        <h3>Ringkasan Statistik</h3>
        <p><strong>Total Transaksi:</strong> {{ $dataLaporan['total_transaksi'] }} Transaksi</p>
        <p><strong>Total Pendapatan:</strong> Rp {{ number_format($dataLaporan['total_pendapatan'], 0, ',', '.') }}</p>
    </div>

    <h3>Daftar Produk Terlaris</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah Terjual</th>
                <td><a href="{{ url('/produk/' . $item['id']) }}">Lihat Detail</a></td>
            </tr>
        </thead>
        <tbody>
            @foreach($dataLaporan['produk_terlaris'] as $index => $produk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $produk['nama'] }}</td>
                <td>{{ $produk['terjual'] }} unit</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
