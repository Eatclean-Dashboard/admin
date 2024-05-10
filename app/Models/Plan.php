<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "plans";

    use HasFactory;

    protected $fillable = [
        'meal_plan_id',
        'type',
        'name',
        'ingredients',
        'calories',
        'price',
        'carbohydrate',
        'protein',
        'fat',
        'procedure',
        'image_rectangular',
        'image_oval'
    ];

    public function mealplan()
    {
        return $this->belongsTo(MealPlan::class, 'meal_plan_id');
    }
}
