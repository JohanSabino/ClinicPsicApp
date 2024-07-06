<?php

namespace App\Models;

use Database\Factories\DocumentTypeFactory;
use Eloquent;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static DocumentTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType psychologistDocumentTypes()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUpdatedAt($value)
 * @mixin Eloquent
 */
class DocumentType extends Model
{
    use HasFactory;

    /**
     * Get psychologist document types
     * @param Builder $query
     * @return void
     */
    public function scopePsychologistDocumentTypes(Builder $query): void
    {
        $query->whereIn('id', array_column(\App\Enums\DocumentType::psychologists(), 'value'));
    }
}
