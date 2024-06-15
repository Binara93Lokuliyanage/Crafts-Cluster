<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_id',
        'remaining_amount',
        'withdraw_amount',
        'total_earnings'
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
