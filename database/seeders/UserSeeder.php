<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin12345'),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'Damir@mail.com'],
            [
                'name' => 'Damir',
                'password' => Hash::make('Damir12345'),
                'is_admin' => false,
            ]
        );
    }
}
