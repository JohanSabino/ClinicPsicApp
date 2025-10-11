<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Estados de las citas
     */
    public const STATUS_SCHEDULED   = 1; // Programada
    public const STATUS_CONFIRMED   = 2; // Confirmada
    public const STATUS_IN_PROGRESS = 3; // En progreso
    public const STATUS_COMPLETED   = 4; // Completada
    public const STATUS_CANCELLED   = 5; // Cancelada
    public const STATUS_NO_SHOW     = 6; // No asistió

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'psychologist_id',
        'session_number',
        'status',
        'goals',
        'abstract',
        'progress',
        'mood_last_term',
        'psychological_instruments',
        'schedule_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'schedule_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<int, string>
     */
    protected $dates = ['deleted_at'];

    /**
     * Relación con el paciente
     */
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relación con el psicólogo
     */
    public function psychologist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Psychologist::class);
    }

    /**
     * Scope para filtrar citas de hoy
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('schedule_at', today());
    }

    /**
     * Scope para citas pendientes
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->whereIn('status', [
            self::STATUS_SCHEDULED,
            self::STATUS_CONFIRMED,
        ]);
    }

    /**
     * Scope para citas completadas
     */
    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    /**
     * Scope para un psicólogo específico
     */
    public function scopeForPsychologist(Builder $query, int $psychologistId): Builder
    {
        return $query->where('psychologist_id', $psychologistId);
    }

    /**
     * Nombre del estado
     */
    public function getStatusNameAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_SCHEDULED   => 'Programada',
            self::STATUS_CONFIRMED   => 'Confirmada',
            self::STATUS_IN_PROGRESS => 'En progreso',
            self::STATUS_COMPLETED   => 'Completada',
            self::STATUS_CANCELLED   => 'Cancelada',
            self::STATUS_NO_SHOW     => 'No asistió',
            default => 'Desconocido',
        };
    }

    /**
     * Color del estado
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_SCHEDULED   => 'blue',
            self::STATUS_CONFIRMED   => 'green',
            self::STATUS_IN_PROGRESS => 'yellow',
            self::STATUS_COMPLETED   => 'gray',
            self::STATUS_CANCELLED   => 'red',
            self::STATUS_NO_SHOW     => 'orange',
            default => 'gray',
        };
    }

    /**
     * Verificar si la cita es hoy
     */
    public function getIsTodayAttribute(): bool
    {
        return $this->schedule_at?->isToday() ?? false;
    }

    /**
     * Verificar si la cita ya pasó
     */
    public function getIsPastAttribute(): bool
    {
        return $this->schedule_at?->isPast() ?? false;
    }
}