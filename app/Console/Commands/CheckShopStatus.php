<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    protected $signature = 'pos:status {jam?}';
    protected $description = 'Mengecek status operasional Toko Kelontong POS';
    protected $asking = 'Bertanya nama kasir';
    public function handle()
    {
        // Mengambil argumen jam, jika tidak diisi maka default ke jam 10 pagi
        $jam = $this->argument('jam') ?? 10;
        $this->info("=== SISTEM MONITORING TOKO KELONTONG ===");

        // Asumsi toko buka dari jam 08:00 sampai 21:00
        if ($jam >= 8 && $jam <= 21) {
            $this->info("Status Toko pada jam $jam:00 WIB adalah: BUKA");
            $this->comment("kasir bersiap di meja transaksi.");
            $this->comment("Hallow!!, untuk kasir yang kamu temui bernama Sa'dan Arya Diputra");
        } else {
            $this->error("Status Toko pada jam $jam:00 WIB adalah: TUTUP");
            $this->warn("Untuk jam tersebut Toko sudah tutup. Dateng di lain hari ya :)");
        }
    }
}
