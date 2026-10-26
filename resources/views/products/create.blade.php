<!DOCTYPE html>
<html>

<head>
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select,
        textarea {
            width: 350px;
            padding: 5px;
        }

        .err {
            color: red;
        }
    </style>
</head>

<body>
    @include('partials.menu-buttons')

    <h1>Tambah Produk</h1>

    @if($errors->any())
        <ul class="err">
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li> @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label>Kategori</label>
        <select name="category_id">
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <label>SKU</label>
        <input type="text" name="sku" value="{{ old('sku') }}">

        <label>Harga</label>
        <input type="number" name="price" value="{{ old('price') }}">

        <label>Stok</label>
        <input type="number" name="stock" value="{{ old('stock') }}">

        <label>Deskripsi</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Gambar (jpg/png/webp, maks 2MB)</label>
        <input type="file" name="image" accept="image/jpeg,image/png,image/webp">

        <br><br>
        <button type="submit">Simpan</button>
        <a href="{{ route('products.index') }}">Kembali</a>

        <label>Rotasi Gambar</label>
        <select name="rotate">
            <option value="0" @selected(old('rotate', '0') === '0')>Tidak diputar</option>
            <option value="90" @selected(old('rotate') === '90')>90 derajat</option>
            <option value="180" @selected(old('rotate') === '180')>180 derajat</option>
            <option value="270" @selected(old('rotate') === '270')>270 derajat</option>
        </select>

        <label style="display:flex; align-items:center; gap:8px; margin-top:10px;">
            <input type="checkbox" name="watermark" value="1" style="width:auto;" @checked(old('watermark'))>
            Tambahkan watermark
        </label>
    </form>
</body>

</html>