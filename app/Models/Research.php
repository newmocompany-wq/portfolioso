<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        'title',
        'year',
        'abstract',
        'authors',
        'keywords',
        'journal',
        'conference',
        'doi',
        'link',
        'pdf',
        'cover',
    ];

    protected $casts = [
        'authors' => 'array',
        'keywords' => 'array',
        'year' => 'integer',
    ];
}
