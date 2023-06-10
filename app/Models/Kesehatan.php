<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;

    protected $table = 'kesehatan';
    protected $fillable = [
        'title',
        'category',
        'slug',
        'content',
        'thumbnail',
    ];

    protected $hidden;
}
