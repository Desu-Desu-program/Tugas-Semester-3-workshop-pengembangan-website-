<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class QueryBuilderController extends Controller
{
    // 1. MENGAMBIL DATA (Read - Menampilkan semua data)
    public function index()
    {
        $users = DB::table('users')->get();
        
        return response()->json($users); 
    }

    // 2. MENGAMBIL DATA SPESIFIK (Berdasarkan kondisi/Where)
    public function show()
    {
        $user = DB::table('users')->where('email', 'johndoe@example.com')->first();
        
        return response()->json($user);
    }

    // 3. MEMPERBARUI DATA (Update)
    public function update()
    {
        // Melakukan update data
        DB::table('users')
            ->where('email', 'johndoe@example.com')
            ->update(['status' => 'inactive']);

        DB::table('users')->where('id', 1)->increment('points', 10);
        
        return "Data dan poin berhasil diperbarui!";
    }

    // 4. MENGHAPUS DATA (Delete)
    public function destroy()
    {
        // Menghapus baris data spesifik
        DB::table('users')->where('email', 'johndoe@example.com')->delete();
        
        return "Data pengguna berhasil dihapus!";
    }

    // 5. AGREGAT (Menghitung jumlah, rata-rata, dll)
    public function agregat()
    {
        $totalUsers = DB::table('users')->count();
        $averageAge = DB::table('users')->avg('age');
        
        return "Total user: " . $totalUsers . ", Rata-rata umur: " . $averageAge;
    }

    // 6. JOIN TABEL
    public function joinTabel()
    {
        $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.name', 'orders.total_price')
            ->get();

        return response()->json($users);
    }

    // FUNGSI UNTUK MENAMBAH DATA (Insert)
    public function store()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
            'status' => 'active',
            'points' => 0,
            'role' => 'admin',
            'age' => 20
        ]);
        
        return "Data John Doe berhasil ditambahkan!";
    }
}