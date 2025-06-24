<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Table_login extends Authenticatable
{
    protected $table = 'table_logins'; // ✅ Yeh zaruri hai


     protected $fillable = [
         // Assuming hobbies is stored as a JSON array
         'username',
         'email',
         'password',
    ];
    use HasFactory;
}
