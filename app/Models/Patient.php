<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'document_type_id',
        'identification_number',
        'first_name',
        'last_name',
        'phone_number',
        'birth_date',
        'gender',
        'sexual_orientation',
        'height',
        'weight',
        'address',
        'marital_status',
        'school_grades',
        'eps_company',
        'occupation',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    protected $dates = ['deleted_at'];
    public function appointments()
{
    return $this->hasMany(Appointment::class);
}

public function clinicHistories()
{
    return $this->hasMany(ClinicHistory::class);
}

}