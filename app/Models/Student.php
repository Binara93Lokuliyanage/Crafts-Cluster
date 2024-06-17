<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'picture_url',
        'email',
        'user_id'
    ];

    public function wallet()
    {
        return $this->hasOne(StudentWallet::class);
    }
}
