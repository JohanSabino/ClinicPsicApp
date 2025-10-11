<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $uuid
 * @property int $document_type_id
 * @property string $identification_number
 * @property string $first_name
 * @property string $last_name
 * @property string $professional_card_number
 * @property string|null $academic_profile
 * @property string|null $profile_photo
 * @property string|null $specialty
 * @property string|null $phone
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $name
 *
 * @method static Builder|Psychologist newModelQuery()
 * @method static Builder|Psychologist newQuery()
 * @method static Builder|Psychologist query()
 * @method static Builder|Psychologist whereAcademicProfile($value)
 * @method static Builder|Psychologist whereCreatedAt($value)
 * @method static Builder|Psychologist whereDeletedAt($value)
 * @method static Builder|Psychologist whereDocumentTypeId($value)
 * @method static Builder|Psychologist whereEmail($value)
 * @method static Builder|Psychologist whereEmailVerifiedAt($value)
 * @method static Builder|Psychologist whereFirstName($value)
 * @method static Builder|Psychologist whereId($value)
 * @method static Builder|Psychologist whereIdentificationNumber($value)
 * @method static Builder|Psychologist whereLastName($value)
 * @method static Builder|Psychologist wherePassword($value)
 * @method static Builder|Psychologist whereProfessionalCardNumber($value)
 * @method static Builder|Psychologist whereRememberToken($value)
 * @method static Builder|Psychologist whereUpdatedAt($value)
 * @method static Builder|Psychologist whereUuid($value)
 * @method static Builder|Psychologist whereProfilePhoto($value)
 * @method static Builder|Psychologist whereSpecialty($value)
 * @method static Builder|Psychologist wherePhone($value)
 *
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @mixin Eloquent
 */
class Psychologist extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_type_id',
        'identification_number',
        'first_name',
        'last_name',
        'professional_card_number',
        'academic_profile',
        'profile_photo',     
        'specialty',          
        'phone',              
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Accessor para obtener el nombre completo
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Relación con el tipo de documento
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    /**
     * Obtener la URL completa de la foto de perfil
     *
     * @return string|null
     */
    public function getProfilePhotoUrlAttribute(): ?string
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }
        
        return null;
    }
    public function appointments()
{
    return $this->hasMany(Appointment::class);
}

public function clinicHistories()
{
    // Si luego decides relacionar historias clínicas con psicólogos
    return $this->hasManyThrough(
        ClinicHistory::class,
        Appointment::class,
        'psychologist_id', // FK en appointments
        'patient_id',      // FK en clinic_histories
        'id',              // PK del psicólogo
        'patient_id'       // PK de appointment
    );
}

    /**
     * Obtener las iniciales del psicólogo
     *
     * @return string
     */
    public function getInitialsAttribute(): string
    {
        $firstInitial = $this->first_name ? strtoupper(substr($this->first_name, 0, 1)) : '';
        $lastInitial = $this->last_name ? strtoupper(substr($this->last_name, 0, 1)) : '';
        
        return $firstInitial . $lastInitial;
    }
}