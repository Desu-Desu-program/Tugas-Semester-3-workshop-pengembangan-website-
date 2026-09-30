<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\EloquentController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\ProfileController;


// Route::get('/posts', [PostController::class, 'index']);

// //acara 9
// Route::get('/hello', function () {
//     return "Hello, World!";
// });

// Route::get('/user/{id}', function ($id) {
//     return "User ID: " . $id;
// });

// Route::get('/user/{name?}', function ($name = "DesuDesu") {
//     return "Hello, " . $name;
// });

// Route::get('/dashboard', function () {
//     return "Ini halaman Dashboard";
// })->name('dashboard');

// //acara 10
// // Route::prefix('admin')->group(function () {
// //     Route::get('/dashboard', function () {
// //         return "Admin Dashboard";
// //     });

// //     Route::get('/users', function () {
// //         return "Admin Users";
// //     });

// //     Route::get('/coba', function () {
// //         return "mau coba apa?";
// //     });
// // });

// Route::get('/data', function () {
//     return "GET Request"; });
// Route::post('/data', function () {
//     return "POST Request"; });
// Route::put('/data', function () {
//     return "PUT Request"; });
// Route::delete('/data', function () {
//     return "DELETE Request"; });
// Route::patch('/data', function () {
//     return "PATCH Request"; });

// Route::fallback(function () {
//     return "404 - Not Found, yang bener nyarinya";
// });

// //acara  11
// Route::get('/greeting', function () {
//     $user = new class {
//         public function isAdmin()
//         {
//             return true;
//         }
//     };
//     return view('coba', [
//         'name' => 'Sa\'dan',
//         'user' => $user
//     ]);
// });

// //acara 12
// Route::get('/home', function () {
//     $user = new class {
//         public function isAdmin()
//         {
//             return true;
//         }
//         public function isEditor()
//         {
//             return false;
//         }
//     };
//     $status = 'pending';

//     return view('home', compact('user', 'status'));
// });

// //minggu 3 tugas & evaluasi
// Route::get('/', function () {
//     return view('dashboard_pos', [
//         'nama_pegawai' => 'Budi Santoso',
//         'shift' => 'Pagi (08:00 - 15:00)'
//     ]);
// });

// Route::get('/produk/{id}', function ($id) {
//     return 'Menampilkan data produk dengan ID: ' . $id;
// });

// Route::get('/produk/cari/{nama?}', function ($nama = null) {
//     if ($nama) {
//         return 'Hasil pencarian produk: ' . $nama;
//     }
//     return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/produk', function () {
//         return 'Halaman Kelola Produk (Hanya Admin)';
//     })->name('admin.produk');

//     Route::get('/kategori', function () {
//         return 'Halaman Kelola Kategori Produk (Hanya Admin)';
//     })->name('admin.kategori');
// });

// Route::prefix('kasir')->group(function () {
//     Route::get('/transaksi', function () {
//         return 'Halaman Input Transaksi Penjualan (Kasir)';
//     })->name('kasir.transaksi');
// });

// Route::get('/produk-toko', function () {
//     $data_produk = [
//         ['nama' => 'Beras Pandan Wangi', 'sku' => 'BRS-01', 'harga' => 75000, 'stok' => 50, 'foto' => 'aster.png'],
//         ['nama' => 'Minyak Goreng Bimoli 2L', 'sku' => 'MG-02', 'harga' => 35000, 'stok' => 30, 'foto' => 'aster.png'],
//         ['nama' => 'Gula Pasir Gulaku 1Kg', 'sku' => 'GL-03', 'harga' => 16000, 'stok' => 100, 'foto' => 'aster.png'],
//     ];

//     return view('daftar_produk', ['produk' => $data_produk]);
// });

// // Acara 13-14
// // Tugas mandiri
// Route::get('/laporan', LaporanPenjualanController::class);

// //tugas 15-16
// // Tugas lampiran
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/produk', [ProdukController::class, 'index']);
// Route::get('/produk/{id}', [ProdukController::class, 'show']);

// //tugas ACARA 20
// Route::get('/form', function () {
//     return view('form'); 
// });
// Route::post('/submit', [FormController::class, 'submitForm']);

// //tugas acara 17
// Route::get('/coba-insert', function () {
//     DB::table('users')->insert([
//         'name' => 'Jane Doe',
//         'email' => 'janedoe@example.com',
//         'password' => bcrypt('password123')
//     ]);
//     return "Data Jane Doe berhasil masuk ke database!";
// });

// Route::get('/coba-tampil', function () {
//     $users = DB::table('users')->where('email', 'janedoe@example.com')->first();
//     return response()->json($users);
// });

// Route::get('/query/tampil', [QueryBuilderController::class, 'index']);
// Route::get('/query/tampil-spesifik', [QueryBuilderController::class, 'show']);
// Route::get('/query/ubah', [QueryBuilderController::class, 'update']);
// Route::get('/query/hapus', [QueryBuilderController::class, 'destroy']);
// Route::get('/query/agregat', [QueryBuilderController::class, 'agregat']);
// Route::get('/query/join', [QueryBuilderController::class, 'joinTabel']);
// Route::get('/query/tambah', [QueryBuilderController::class, 'store']);

// //ACARA 18
// Route::get('/eloquent/tambah-create', [EloquentController::class, 'store']);
// Route::get('/eloquent/tambah-save', [EloquentController::class, 'storeSave']);
// Route::get('/eloquent/tampil', [EloquentController::class, 'index']);
// Route::get('/eloquent/ubah', [EloquentController::class, 'update']);
// Route::get('/eloquent/hapus', [EloquentController::class, 'destroy']);

// //ACARA 19
// Route::get('/eloquent2/filter', [EloquentController::class, 'filterData']);
// Route::get('/eloquent2/hapus-sementara', [EloquentController::class, 'hapusSementara']);
// Route::get('/eloquent2/tampil-sampah', [EloquentController::class, 'tampilSampah']);
// Route::get('/eloquent2/kembalikan', [EloquentController::class, 'kembalikanData']);

//Acara 21
Route::get('/admin', function () {
    return "Halaman Admin";
})->middleware('cek.role:admin');

//Acara 22
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
