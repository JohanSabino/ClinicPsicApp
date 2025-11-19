<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DocumentType;
use Illuminate\Support\Str;

class PsychologistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'document_type_id' => DocumentType::query()->inRandomOrder()->value('id') 
                ?? DocumentType::factory(),

            'identification_number' => $this->faker->numerify('##########'),

            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),

            'professional_card_number' => 'PROF-' . strtoupper(Str::random(5)),

            'academic_profile' => $this->faker->randomElement([
                'Psicología Clínica',
                'Psicología Organizacional',
                'Psicología Forense',
                'Psicología Social'
            ]),

            'profile_photo' => $this->faker->imageUrl(300, 300),

            'specialty' => $this->faker->randomElement([
                'Cognitiva',
                'Terapia Familiar',
                'Niñez y Adolescencia',
                'Neuropsicología'
            ]),

            'phone' => $this->faker->numerify('3#########'),

            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),

            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}