<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 350px; padding: 5px; }
        .err { color: red; }
    </style>
</head>
<body>
    <h1>Tambah Produk</h1>

    @if($errors->any())
        <ul class="err">
            @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
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
        <input type="file" name="image">

        <br><br>
        <button type="submit">Simpan</button>
        <a href="{{ route('products.index') }}">Kembali</a>
    </form>
</body>
</html>