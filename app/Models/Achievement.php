<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'cover',
        'date',
        'category',
        'live_link',
        'gallery',
        'order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'date' => 'date',
        'order' => 'integer',
    ];
}
