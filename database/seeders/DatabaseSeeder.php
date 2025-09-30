<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Psychologist;
use App\Models\DocumentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1️⃣ Seeder de tipos de documento
        $this->call(DocumentTypeSeeder::class);

        // 2️⃣ Usuario Admin
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin Last name',
            'email' => 'adm1n1str4tor.admin@logicwork.com',
            'password' => Hash::make('password123'),
        ]);

        // 3️⃣ Psychologist Admin
        $documentType = DocumentType::firstOrCreate(['name' => 'Cédula']);

        Psychologist::create([
            'document_type_id' => $documentType->id,
            'identification_number' => '123456789', 
            'first_name' => 'Admin',
            'last_name' => 'Psychologist',
            'professional_card_number' => 'PROF123',
            'academic_profile' => 'Psicología',
            'email' => 'admin@clinic.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);
    }
}