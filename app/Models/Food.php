<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = "food";
    
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'carbs',
        'protein',
        'total_fat'
    ];
}
