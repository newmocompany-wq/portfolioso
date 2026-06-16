<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'vision',
        'skills',
        'interests',
    ];

    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
    ];
}
