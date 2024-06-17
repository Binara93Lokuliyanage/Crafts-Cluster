<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'remaining_amount',
        'total_spent'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
