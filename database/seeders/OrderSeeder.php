<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user || Product::count() === 0) {
            $this->command->warn('Butuh minimal 1 user dan 1 produk dulu.');
            return;
        }

        $order = Order::create(['user_id' => $user->id, 'total_amount' => 0]);
        $total = 0;

        foreach (Product::inRandomOrder()->take(3)->get() as $p) {
            $qty = rand(1, 3);
            $subtotal = $p->price * $qty;

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $p->id,
                'quantity'   => $qty,
                'price'      => $p->price,
                'subtotal'   => $subtotal,
            ]);
            $total += $subtotal;
        }

        $order->update(['total_amount' => $total]);
    }
}