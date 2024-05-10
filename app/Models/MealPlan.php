<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    protected $table = "meal_plans";

    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class, 'meal_plan_id');
    }

    public function snacks()
    {
        return $this->hasMany(Snack::class, 'meal_plan_id');
    }
}
