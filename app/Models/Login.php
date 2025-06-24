<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable

{
    protected $table = 'login'; // Specify the table name if it's not the default 'employees'
    protected $fillable = [
        'username',
        'email',
        'gender',
        'password', // Assuming hobbies is stored as a JSON array
    ];
    public function user()
    {
        return $this->belongsTo(Task::class);
    }
    use HasFactory;
}
