<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\DocumentType;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $cedula = DocumentType::firstOrCreate(['name' => 'Cédula']);

        Patient::factory()->count(20)->create([
            'document_type_id' => $cedula->id,
        ]);
    }
}