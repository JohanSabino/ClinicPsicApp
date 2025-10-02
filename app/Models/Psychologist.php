<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $uuid
 * @property int $document_type_id
 * @property string $identification_number
 * @property string $first_name
 * @property string $last_name
 * @property string $professional_card_number
 * @property string $academic_profile
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 *
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @mixin Eloquent
 */
class Psychologist extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< HEAD
        'document_type_id',
        'identification_number',
        'first_name',
        'last_name',
        'professional_card_number',
        'academic_profile',
        'email',
        'email_verified_at',
=======
        'name',
        'email',
>>>>>>> origin/master
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
<<<<<<< HEAD
     * The attributes that should be cast.
=======
     * Get the attributes that should be cast.
>>>>>>> origin/master
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
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/master
