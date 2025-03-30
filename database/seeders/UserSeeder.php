<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $emails = [
            'swoyamsuwal07@gmail.com',
            'johitthebe@gmail.com',
            'rijen.maharjan12@gmail.com',
            'sumanshrrstha12000@gmail.com',
            'bhattaanil604@gmail.com'
        ];

        foreach ($emails as $email) {
            User::create([
                'name' => 'User',
                'email' => $email,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
