<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::factory()->create([
            'name' => 'Cédula'
        ]);
        DocumentType::factory()->create([
            'name' => 'Tarjeta de identidad'
        ]);
        DocumentType::factory()->create([
            'name' => 'Cédula de extranjería'
        ]);
        DocumentType::factory()->create([
            'name' => 'PPT'
        ]);
        DocumentType::factory()->create([
            'name' => 'pasaporte'
        ]);
    }
}
