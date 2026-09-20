<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;


class SupplierSeeder extends Seeder {
    public function run(): void {
        Supplier::create([
            'name' => 'PT. Indofood Sukses Makmur',
            'phone' => '02157958822',
            'address' => 'Sudirman Plaza, Jakarta'
        ]);

        Supplier::create([
            'name' => 'PT. Unilever Indonesia',
            'phone' => '02180827000',
            'address' => 'BSD City, Tangerang'
        ]);

        Supplier::create([
            'name' => 'PT. Mayora Indah',
            'phone' => '02180637000',
            'address' => 'Daan Mogot, Jakarta'
        ]);
    }
}
