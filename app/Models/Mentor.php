<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'resume_url',
        'email',
        'user_id'
    ];

    public function wallet()
    {
        return $this->hasOne(MentorWallet::class);
    }
}
