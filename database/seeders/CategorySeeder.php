<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Clothing'],
            ['name' => 'Electronics'],
            ['name' => 'Beauty & Care'],
            ['name' => 'Home & Kitchen'],
            ['name' => 'Sports & Outdoors'],
            ['name' => 'Toys & Hobbies'],
            ['name' => 'Food & Beverage'],
            ['name' => 'Medicine'],
        ]);
    }
}
