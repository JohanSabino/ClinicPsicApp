<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        echo "Usuario administrador creado:\n";
        echo "Email: admin@admin.com\n";
        echo "Password: admin123\n";
    }
}