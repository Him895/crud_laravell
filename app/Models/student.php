<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{

    protected $table = 'student';

    protected $fillable = [
        'studentname',
        'email',
        'mobileno',
        'courses',
        'gender',
    ];

    protected $casts = [
         'courses' => 'array', // Cast hobbies to an array
    ];
    use HasFactory;
}
