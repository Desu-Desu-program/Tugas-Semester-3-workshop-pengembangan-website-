<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EloquentController extends Controller
{

    // 1. CREATE (Menambahkan Data)
    public function store()
    {
        User::create([
            'name' => 'DesuDesu',
            'email' => 'desu@example.com',
            'password' => bcrypt('desu123')
        ]);

        return "Data DesuDesu berhasil ditambahkan menggunakan Eloquent!";
    }

    // 2. RETRIEVE (Mengambil Semua Data)
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    // 3. UPDATE (Memperbarui Data)
    public function update()
    {
        User::where('email', 'desu@example.com')
            ->update(['name' => 'DesuDesu Terupdate']);

        return "Data DesuDesu berhasil diperbarui!";
    }

    // 4. DELETE (Menghapus Data Permanen/Biasa)
    public function destroy()
    {
        $user = User::where('email', 'desu@example.com')->first();

        if ($user) {
            $user->forceDelete();
            return "Data DesuDesu berhasil dihapus permanen!";
        }

        return "Data tidak ditemukan.";
    }

    
    // 1. Output Conditional Clause (Filter Data)
    public function filterData()
    {
        $users = User::whereBetween('age', [18, 30])->get();
        
        return response()->json($users);
    }

    // 2. Output Eksekusi Soft Delete
    public function hapusSementara()
    {
        $user = User::where('email', 'desu@example.com')->first();
        
        if($user) {
            $user->delete();
            return "Data DesuDesu berhasil dihapus sementara (Soft Delete)! Cek kolom deleted_at di database.";
        }
        
        return "Data tidak ditemukan.";
    }

    // 3. Output Melihat Data yang Sudah Di-Soft Delete
    public function tampilSampah()
    {
        $trashedUsers = User::onlyTrashed()->get();
        
        return response()->json($trashedUsers);
    }

    // 4. Output Mengembalikan Data (Restore)
    public function kembalikanData()
    {
        $user = User::withTrashed()->where('email', 'desu@example.com')->first();
        
        if($user) {
            $user->restore();
            return "Data DesuDesu berhasil dikembalikan (Restore)! Kolom deleted_at kembali menjadi NULL.";
        }
        
        return "Data sampah tidak ditemukan.";
    }
}