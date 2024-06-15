<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    protected $table = "snacks";

    use HasFactory;

    protected $fillable = [
        'meal_plan_id',
        'fruit',
        'calories',
        'carbs',
        'protein',
        'fat',
        'image',
        'oval_image'
    ];

    public function mealplan()
    {
        return $this->belongsTo(MealPlan::class, 'meal_plan_id');
    }
}
