<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'mentor_id',
        'price',
        'img_url'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function mentorCourseLessons()
    {
        return $this->hasMany(MentorCourseLesson::class);
    }
}
