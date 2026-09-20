<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Eksekusi seeder untuk kategori dan supplier
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
        ]);

        // 2. Eksekusi factory untuk membuat 50 data produk
        \App\Models\Product::factory(50)->create();
    }
}