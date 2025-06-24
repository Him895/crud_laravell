<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_register extends Model
{
    protected $table="student_register";
    protected $fillable = [
    'name',
    'email',
    'mobileno',
    'doj',
    'gender',

];
    use HasFactory;
}
