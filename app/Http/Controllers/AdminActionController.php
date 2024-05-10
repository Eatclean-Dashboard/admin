<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\MealPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminActionController extends Controller
{
    protected $service;
    protected $auth;

    public function __construct(MealPlanService $mealPlanService, AuthService $authService)
    {
        $this->service = $mealPlanService;
        $this->auth = $authService;
    }

    public function createPlan(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'meal_plan_id' => ['required'],
            'type' => ['required'],
            'ingredients' => ['required'],
            'calories' => ['required'],
            'carbohydrate' => ['required'],
            'protein' => ['required'],
            'fat' => ['required'],
            'procedure' => ['required'],
        ], [
            'meal_plan_id' => "The Meal plan field is required"
        ]);

        return $this->service->createPlan($request);
    }

    public function adminCreate(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'email:rfc,dns', 'max:100']
        ]);

        return $this->auth->createAdminUser($request);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return $this->auth->login($request);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
