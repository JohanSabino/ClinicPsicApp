<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identification_number' => $this->faker->unique()->randomNumber(8),
            'identification_type' => $this->faker->randomElement(['Cédula de Ciudadanía', 'Registro Civil', 'Tarjeta de Identidad', 'Cédula de Extranjeria', 'Pasaporte', 'Otro']),
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
        ];
    }
}
