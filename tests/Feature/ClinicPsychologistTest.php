<?php

namespace Tests\Feature\ClinicPsicApp;

use Tests\TestCase;
use App\Models\Psychologist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClinicPsychologistTest extends TestCase
{
    use RefreshDatabase;

    private function authenticate()
    {
        $psychologist = Psychologist::factory()->create();
        $this->actingAs($psychologist, 'sanctum');

        return $psychologist;
    }

    /** @test */
    public function psychologist_can_login()
    {
        $psychologist = Psychologist::factory()->create([
            'password' => bcrypt('123456'),
        ]);

        $response = $this->postJson('/api/psychologist/login', [
            'email' => $psychologist->email,
            'password' => '123456'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }

    /** @test */
    public function it_returns_all_psychologists()
    {
        $this->authenticate();

        Psychologist::factory()->count(3)->create();

        $response = $this->getJson('/api/psychologist/all');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    '*' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email'
                    ]
                 ]);
    }

    /** @test */
    public function it_returns_a_single_psychologist()
    {
        $this->authenticate();

        $psychologist = Psychologist::factory()->create();

        $response = $this->getJson('/api/psychologist/' . $psychologist->id);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $psychologist->id
                 ]);
    }

    /** @test */
    public function it_creates_a_psychologist()
    {
        $this->authenticate();

        $data = [
            'document_type_id' => 1,
            'identification_number' => '123456789',
            'first_name' => 'Nuevo',
            'last_name' => 'Psicólogo',
            'professional_card_number' => 'PC-9999',
            'academic_profile' => 'Clínica',
            'email' => 'nuevo@example.com',
            'password' => '123456'
        ];

        $response = $this->postJson('/api/psychologist', $data);

        $response->assertStatus(201);
    }

    /** @test */
    public function it_updates_psychologist_partially()
    {
        $this->authenticate();

        $psychologist = Psychologist::factory()->create();

        $response = $this->patchJson('/api/psychologist/' . $psychologist->id, [
            'specialty' => 'Forense'
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_updates_psychologist_completely()
    {
        $this->authenticate();

        $psychologist = Psychologist::factory()->create();

        $data = [
            'first_name' => 'Nuevo',
            'last_name' => 'Nombre',
            'email' => 'nuevo@example.com',
            'specialty' => 'Organizacional'
        ];

        $response = $this->putJson('/api/psychologist/' . $psychologist->id, $data);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_deletes_a_psychologist()
    {
        $this->authenticate();

        $psychologist = Psychologist::factory()->create();

        $response = $this->deleteJson('/api/psychologist/' . $psychologist->id);

        $response->assertStatus(200);
    }
}