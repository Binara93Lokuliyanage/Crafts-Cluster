<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'img_url',
        'category_id',
        'min_price',
        'max_price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
