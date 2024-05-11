<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use App\Services\AuthService;
use App\Services\MealPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
            'email' => ['required', 'email', 'email:rfc,dns', 'max:100', 'unique:super_admins,email']
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

    public function changepassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', Password::min(8)->mixedCase()->symbols()],
            'confirm_password' => ['required', 'same:new_password']
        ]);

        $auth = Auth::guard('superadmin')->user();
        $user = SuperAdmin::findorFail($auth->id);

        if (Hash::check($request->old_password, $user->password)) {

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

             return back()->with('success', 'Password Successfully Updated');
        }else
        {
            return back()->with('error', 'Old Password did not match');
        }
    }
}
