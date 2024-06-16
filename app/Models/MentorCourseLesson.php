<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorCourseLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_course_id',
        'title',
        'lesson',
        'video_url'
    ];
}
