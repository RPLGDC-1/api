<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Generate fake data for each product
        foreach (range(1, 50) as $index) { // Menghasilkan 10 produk
            Product::insert([
                'name' => $faker->word(),
                'description' => $faker->sentence,
                'image' => "https://source.unsplash.com/random/400x300",
                'quantity' => $faker->numberBetween(1, 100),
                'rating' => $faker->randomFloat(1, 1, 5), // Angka desimal acak antara 1 dan 5
                'sold' => $faker->numberBetween(0, 1000),
                'category_id' => $faker->numberBetween(1, 8),
                'price' => $faker->numberBetween(10000, 1000000),
                'selling_price' => $faker->numberBetween(9000, 900000),
            ]);
        }
        
    }
}
