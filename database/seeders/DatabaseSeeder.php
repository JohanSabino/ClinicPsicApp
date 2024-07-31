<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin Last name',
            'email' => 'adm1n1str4tor.admin@logicwork.com',
            'password' => Hash::make('password123'),
        ]);

        $this->call(DocumentTypeSeeder::class);
    }
}
