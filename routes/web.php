<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\ProdukController;

Route::get('/posts', [PostController::class, 'index']);

//acara 9
Route::get('/hello', function () {
    return "Hello, World!";
});

Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});

Route::get('/user/{name?}', function ($name = "DesuDesu") {
    return "Hello, " . $name;
});

Route::get('/dashboard', function () {
    return "Ini halaman Dashboard";
})->name('dashboard');

//acara 10
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });

    Route::get('/users', function () {
        return "Admin Users";
    });

    Route::get('/coba', function () {
        return "mau coba apa?";
    });
});

Route::get('/data', function () {
    return "GET Request"; });
Route::post('/data', function () {
    return "POST Request"; });
Route::put('/data', function () {
    return "PUT Request"; });
Route::delete('/data', function () {
    return "DELETE Request"; });
Route::patch('/data', function () {
    return "PATCH Request"; });

Route::fallback(function () {
    return "404 - Not Found, yang bener nyarinya";
});

//acara  11
Route::get('/greeting', function () {
    $user = new class {
        public function isAdmin()
        {
            return true;
        }
    };
    return view('coba', [
        'name' => 'Sa\'dan',
        'user' => $user
    ]);
});

//acara 12
Route::get('/home', function () {
    $user = new class {
        public function isAdmin()
        {
            return true;
        }
        public function isEditor()
        {
            return false;
        }
    };
    $status = 'pending';

    return view('home', compact('user', 'status'));
});

//minggu 3 tugas & evaluasi
Route::get('/', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00 - 15:00)'
    ]);
});

Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/produk-toko', function () {
    $data_produk = [
        ['nama' => 'Beras Pandan Wangi', 'sku' => 'BRS-01', 'harga' => 75000, 'stok' => 50, 'foto' => 'aster.png'],
        ['nama' => 'Minyak Goreng Bimoli 2L', 'sku' => 'MG-02', 'harga' => 35000, 'stok' => 30, 'foto' => 'aster.png'],
        ['nama' => 'Gula Pasir Gulaku 1Kg', 'sku' => 'GL-03', 'harga' => 16000, 'stok' => 100, 'foto' => 'aster.png'],
    ];

    return view('daftar_produk', ['produk' => $data_produk]);
});

// Acara 13-14
Route::get('/laporan', LaporanPenjualanController::class);

Route::get('/', function () {
    return view('welcome');
});

// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
