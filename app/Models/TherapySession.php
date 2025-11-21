<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TherapySession extends Model
{
    protected $table = 'therapy_sessions';

    protected $fillable = [
        'patient_id',
        'psychologist_id',
        'session_number',
        'date',
        'goals',
        'abstract',
        'progress',
        'mood_last_term',
        'psychological_instruments',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function psychologist()
    {
        return $this->belongsTo(Psychologist::class);
    }
}