<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
