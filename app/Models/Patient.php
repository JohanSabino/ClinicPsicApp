<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Patient para ClinicPsicApp
 * 
 * Representa el perfil específico de pacientes con información médica
 * 
 * @property int $id
 * @property int $user_id
 * @property string $document_type
 * @property string $document_number
 * @property string $emergency_contact_name
 * @property string $emergency_contact_phone
 * @property string $emergency_contact_relationship
 * @property string $medical_history
 * @property string $current_medications
 * @property string $allergies
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * 
 * @author Johan Camilo Daza Sabino
 * @version 1.0
 * @since 2025-09-30
 */
class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Tipos de documento disponibles
     */
    public const DOCUMENT_TYPES = [
        'CC' => 'Cédula de Ciudadanía',
        'TI' => 'Tarjeta de Identidad',
        'CE' => 'Cédula de Extranjería',
        'PP' => 'Pasaporte'
    ];

    /**
     * Tipos de contacto de emergencia
     */
    public const EMERGENCY_CONTACT_TYPES = [
        'parent' => 'Padre/Madre',
        'spouse' => 'Cónyuge',
        'sibling' => 'Hermano/a',
        'child' => 'Hijo/a',
        'friend' => 'Amigo/a',
        'other' => 'Otro'
    ];

    /**
     * La tabla asociada con el modelo
     */
    protected $table = 'patients';

    /**
     * Atributos asignables en masa
     */
    protected $fillable = [
        'user_id',
        'document_type',
        'document_number',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'medical_history',
        'current_medications',
        'allergies',
        'insurance_provider',
        'insurance_number',
        'active'
    ];

    /**
     * Atributos que deben ser casteados
     */
    protected $casts = [
        'medical_history' => 'array',
        'current_medications' => 'array',
        'allergies' => 'array',
        'active' => 'boolean'
    ];

    /**
     * Atributos que deben ser mutados a fechas
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Relación con el usuario base
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con las citas médicas
     * Nota: Requiere modelo Appointment
     */
    public function appointments(): HasMany
    {
        return $this->hasMany('App\Models\Appointment');
    }

    /**
     * Relación con el historial clínico
     * Nota: Requiere modelo ClinicalRecord
     */
    public function clinicalRecords(): HasMany
    {
        return $this->hasMany('App\Models\ClinicalRecord');
    }

    /**
     * Obtiene el nombre completo del paciente
     */
    public function getFullNameAttribute(): string
    {
        return $this->user->name ?? 'N/A';
    }

    /**
     * Obtiene el email del paciente
     */
    public function getEmailAttribute(): string
    {
        return $this->user->email ?? 'N/A';
    }

    /**
     * Obtiene el teléfono del paciente
     */
    public function getPhoneAttribute(): string
    {
        return $this->user->phone ?? 'N/A';
    }

    /**
     * Obtiene la edad del paciente
     */
    public function getAgeAttribute(): ?int
    {
        if (!$this->user || !$this->user->date_of_birth) {
            return null;
        }
        
        return $this->user->date_of_birth->diffInYears(now());
    }

    /**
     * Obtiene el documento completo (tipo + número)
     */
    public function getFullDocumentAttribute(): string
    {
        return "{$this->document_type} {$this->document_number}";
    }

    /**
     * Verifica si el paciente tiene alergias registradas
     */
    public function hasAllergies(): bool
    {
        return is_array($this->allergies) && count($this->allergies) > 0;
    }

    /**
     * Verifica si el paciente toma medicamentos actuales
     */
    public function hasCurrentMedications(): bool
    {
        return is_array($this->current_medications) && count($this->current_medications) > 0;
    }

    /**
     * Verifica si el paciente tiene historial médico
     */
    public function hasMedicalHistory(): bool
    {
        return is_array($this->medical_history) && count($this->medical_history) > 0;
    }

    /**
     * Obtiene las próximas citas del paciente
     */
    public function getUpcomingAppointments(int $limit = 5)
    {
        return $this->appointments()
            ->with(['psychologist.user'])
            ->where('appointment_date', '>=', now())
            ->where('status', '!=', 'cancelled')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->limit($limit)
            ->get();
    }

    /**
     * Obtiene la última cita completada del paciente
     */
    public function getLastCompletedAppointment()
    {
        return $this->appointments()
            ->with(['psychologist.user'])
            ->where('status', 'completed')
            ->orderBy('appointment_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->first();
    }

    /**
     * Obtiene el total de citas del paciente
     */
    public function getTotalAppointments(): int
    {
        return $this->appointments()->count();
    }

    /**
     * Obtiene el total de citas completadas
     */
    public function getCompletedAppointments(): int
    {
        return $this->appointments()->where('status', 'completed')->count();
    }

    /**
     * Obtiene el total de citas canceladas
     */
    public function getCancelledAppointments(): int
    {
        return $this->appointments()->where('status', 'cancelled')->count();
    }

    /**
     * Obtiene los tipos de documento disponibles
     */
    public static function getDocumentTypes(): array
    {
        return self::DOCUMENT_TYPES;
    }

    /**
     * Obtiene los tipos de contacto de emergencia
     */
    public static function getEmergencyContactTypes(): array
    {
        return self::EMERGENCY_CONTACT_TYPES;
    }

    /**
     * Scope para buscar pacientes por término
     */
    public function scopeSearch($query, string $term)
    {
        return $query->whereHas('user', function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('email', 'like', "%{$term}%");
        })->orWhere('document_number', 'like', "%{$term}%");
    }

    /**
     * Scope para pacientes activos (no eliminados)
     */
    public function scopeActive($query)
    {
        return $query->where('active', true)->whereNull('deleted_at');
    }

    /**
     * Scope para pacientes inactivos
     */
    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }

    /**
     * Scope para pacientes por tipo de documento
     */
    public function scopeByDocumentType($query, string $documentType)
    {
        return $query->where('document_type', $documentType);
    }

    /**
     * Scope para pacientes con citas programadas
     */
    public function scopeWithUpcomingAppointments($query)
    {
        return $query->whereHas('appointments', function ($q) {
            $q->where('appointment_date', '>=', now())
              ->where('status', '!=', 'cancelled');
        });
    }

    /**
     * Scope para pacientes nuevos (creados en el último mes)
     */
    public function scopeNew($query)
    {
        return $query->where('created_at', '>=', now()->subMonth());
    }

    /**
     * Obtiene el estado del paciente como texto
     */
    public function getStatusTextAttribute(): string
    {
        return $this->active ? 'Activo' : 'Inactivo';
    }

    /**
     * Obtiene la clase CSS para el estado
     */
    public function getStatusClassAttribute(): string
    {
        return $this->active ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100';
    }

    /**
     * Formatea las alergias como string
     */
    public function getAllergiesStringAttribute(): string
    {
        if (!$this->hasAllergies()) {
            return 'Ninguna';
        }
        
        return is_array($this->allergies) ? implode(', ', $this->allergies) : 'Ninguna';
    }

    /**
     * Formatea los medicamentos como string
     */
    public function getMedicationsStringAttribute(): string
    {
        if (!$this->hasCurrentMedications()) {
            return 'Ninguno';
        }
        
        return is_array($this->current_medications) ? implode(', ', $this->current_medications) : 'Ninguno';
    }

    /**
     * Verifica si el paciente puede ser eliminado
     */
    public function canBeDeleted(): bool
    {
        // No se puede eliminar si tiene citas futuras programadas
        return !$this->appointments()
            ->where('appointment_date', '>', now())
            ->where('status', 'scheduled')
            ->exists();
    }

    /**
     * Obtiene el resumen del paciente para mostrar en listas
     */
    public function getSummaryAttribute(): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->full_document,
            'age' => $this->age,
            'status' => $this->status_text,
            'upcoming_appointments' => $this->getUpcomingAppointments(3)->count(),
            'total_appointments' => $this->getTotalAppointments(),
            'last_visit' => $this->getLastCompletedAppointment()?->appointment_date?->format('d/m/Y')
        ];
    }
}