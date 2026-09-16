<?php
// Acara 13-14
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function __invoke(Request $request)
    {
        $dataLaporan = [
            'bulan' => 'September 2026',
            'total_pendapatan' => 25500000,
            'total_transaksi' => 145,
            'produk_terlaris' => [
                ['nama' => 'Laptop Asus ROG', 'terjual' => 12],
                ['nama' => 'Mouse Wireless Logitech', 'terjual' => 45],
                ['nama' => 'Keyboard Mechanical', 'terjual' => 28],
            ]
        ];

        return view('laporan', compact('dataLaporan'));
    }
}
