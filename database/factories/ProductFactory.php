<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Mengambil ID kategori secara acak, atau default 1 jika kosong
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'name' => $this->faker->words(2, true),
            'sku' => 'PRD-' . $this->faker->unique()->numberBetween(10000, 99999),
            'price' => $this->faker->numberBetween(5000, 100000),
            'stock' => $this->faker->numberBetween(5, 100),
        ];
    }
}