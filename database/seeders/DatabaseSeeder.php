<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'bio' => "Voluptas soluta rem minima est. Dolor quod qui pariatur eaque maiores rerum veniam    .",
            'email_verified_at' => now(),
            'password' => '$2y$10$GzLM4K5uE.6NizMCeqDH3uW38BYDhzbyZxt8J0Abcw..dYo3wvlOa', //administrator
            'role' => 'administrator',
            'status' => 'active',
            'remember_token' => Str::random(10),
        ]);
        // User::factory(20)->create();
        // Car::factory(50)->create();
    }
}
