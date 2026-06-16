<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'objectives',
        'cover',
    ];

    protected $casts = [
        'objectives' => 'array',
    ];

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }
}
