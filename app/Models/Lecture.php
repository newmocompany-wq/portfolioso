<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'pdf',
        'video_url',
        'youtube_url',
        'note_url',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
        'course_id' => 'integer',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
