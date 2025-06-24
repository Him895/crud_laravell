<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
   protected $table = 'trade';
     protected $fillable = [
         // Assuming hobbies is stored as a JSON array
         'name',
         'email',
         'password',
    ];
    use HasFactory;
}
