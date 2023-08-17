<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => "John Doe",
                'email' => "customer@gmail.com",
                'password' => bcrypt("customer"),
                'type' => 'user',
            ],
            [
                'name' => "Admin John Doe",
                'email' => "admin@gmail.com",
                'password' => bcrypt("admin"),
                'type' => 'admin',
            ],
        ]);
    }
}
