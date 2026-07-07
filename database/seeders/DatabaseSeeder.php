<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]
        );

        // Customer
        User::updateOrCreate(
            ['email' => 'fina@gmail.com'],
            [
                'name' => 'fina',
                'password' => Hash::make('fina1234'),
                'role' => 'customer',
            ]
        );
    }
}