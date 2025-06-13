<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{
    protected $table = 'employees'; // Specify the table name if it's not the default 'employees'
    protected $fillable = [
        'name',
        'email',
        'city',
        'gender',
        'hobbies', // Assuming hobbies is stored as a JSON array
    ];
    protected $casts = [
        'hobbies' => 'array', // Cast hobbies to an array
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value); // Capitalize the first letter of the name
    }


    use HasFactory;
}
