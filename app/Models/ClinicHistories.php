<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ClinicHistories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clinic_histories';

    /**
     * Atributos asignables en masa
     */
    protected $fillable = [
        'patient_id',
        'reason_for_consultation_type',
        'reason_for_consultation',
        'trigger_for_consultation',
        'term_of_pregnancy',
        'prenatal_issues',
        'birth_data',
        'birth_data_complement',
        'childhood_description',
        'cognitive_development',
        'cognitive_development_complement',
        'pathologies',
        'pathologies_complement',
        'psychiatric_medication',
        'surgeries',
        'hospitalizations',
        'siblings',
        'living_with',
        'household',
        'marriage_history',
        'children',
        'children_relationship',
        'parents',
        'parents_relationship',
        'health_habits',
        'patient_normal_day',
        'family_psychological_history',
        'family_psychological_history_complement',
        'family_medical_history',
        'family_medical_history_complement',
        'family_neurological_history',
        'family_neurological_history_complement',
        'previous_therapy',
        'diagnostic_impression_dsmv',
        'general_observations',
    ];

    /**
     * Casts para atributos JSON y fechas
     */
    protected $casts = [
        'prenatal_issues' => 'array',
        'birth_data' => 'array',
        'cognitive_development' => 'array',
        'pathologies' => 'array',
        'siblings' => 'array',
        'health_habits' => 'array',
        'family_psychological_history' => 'array',
        'family_medical_history' => 'array',
        'family_neurological_history' => 'array',
    ];

    /**
     * Relaciones
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Scope para historias de un paciente
     */
    public function scopeForPatient(Builder $query, int $patientId): Builder
    {
        return $query->where('patient_id', $patientId);
    }

    /**
     * Scope para filtrar por término de embarazo
     */
    public function scopeWithPregnancyTerm(Builder $query, string $term): Builder
    {
        return $query->where('term_of_pregnancy', $term);
    }
}