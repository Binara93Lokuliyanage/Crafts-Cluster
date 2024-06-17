<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'mentor_course_id'
    ];

    public function mentorCourse()
    {
        return $this->belongsTo(MentorCourse::class);
    }

    public function student()
{
    return $this->belongsTo(Student::class);
}
}
