<?php

namespace App\Http\Controllers;

use App\Imports\FoodImport;
use App\Models\Food;
use App\Models\MealPlan;
use App\Models\Plan;
use App\Models\Snack;
use App\Models\User;
use App\Services\FoodService;
use App\Services\MealPlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    protected $food;
    protected $mealplan;

    public function __construct(FoodService $foodService, MealPlanService $mealPlanService)
    {
        $this->food = $foodService;
        $this->mealplan = $mealPlanService;
    }
    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $totalfood = Food::count();
        $totalmealplan = MealPlan::count();
        $totalplan = Plan::count();
        $totalusers = User::count();

        $days = Carbon::now()->subDays(3);
        $newUsers = User::where('created_at', '>=', $days)
        ->orderBy('created_at', 'desc')
        ->limit(20)
        ->get();

        return view('dashboard.home', compact('totalfood', 'totalmealplan', 'totalplan', 'totalusers', 'newUsers'));
    }

    public function food()
    {
        $foods = Food::paginate(25);

        return view('dashboard.food', compact('foods'));
    }

    public function foodImport(Request $request)
    {
        $request->validate([
            'import_file' => ['required', 'file']
        ]);

        return $this->food->foodImport($request);
    }

    public function allUsers()
    {
        $allUsers = User::paginate(25);

        return view('dashboard.allusers', compact('allUsers'));
    }

    public function activeUsers()
    {
        $activeUsers = User::where('email_verified_at', '!=', null)->paginate(25);

        return view('dashboard.activeusers', compact('activeUsers'));
    }

    public function inactiveUsers()
    {
        $inactiveUsers = User::where('email_verified_at', null)->paginate(25);

        return view('dashboard.inactiveusers', compact('inactiveUsers'));
    }

    public function mealPlan()
    {
        $mealPlans = MealPlan::paginate(25);

        return view('dashboard.mealplan', compact('mealPlans'));
    }

    public function addMealPlan(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:100']
        ]);

        return $this->mealplan->addMealPlan($request);
    }

    public function viewMealPlan($id)
    {
        $mealPlan = MealPlan::with(['plans', 'snacks'])->findOrFail($id);
        $groupedPlans = $mealPlan?->plans->groupBy('type');
        $snacks = $mealPlan?->snacks;

        return view('dashboard.mealplanview', compact('mealPlan', 'groupedPlans', 'snacks'));
    }

    public function updateMealPlan(Request $request, $id)
    {
        return $this->mealplan->updateMealPlan($request, $id);
    }

    public function plan()
    {
        $plans = Plan::with('mealplan')->paginate(25);

        return view('dashboard.plan', compact('plans'));
    }

    public function planId($id)
    {
        $plan = Plan::with('mealplan')->findOrFail($id);

        return view('dashboard.oneplan', compact('plan'));
    }

    public function planAdd()
    {
        $mealplans = MealPlan::get();

        return view('dashboard.planadd', compact('mealplans'));
    }

    public function planEdit($id)
    {
        $plan = Plan::with('mealplan')->findOrFail($id);
        $mealplans = MealPlan::get();

        return view('dashboard.planedit', compact('plan', 'mealplans'));
    }

    public function planImport(Request $request)
    {
        $request->validate([
            'import_file' => ['required', 'file']
        ]);

        return $this->mealplan->planImport($request);
    }

    public function snack()
    {
        $snacks = Snack::with('mealplan')->paginate(25);

        return view('dashboard.snack', compact('snacks'));
    }

    public function snackEdit($id)
    {
        $snack = Snack::with('mealplan')->findOrFail($id);
        $mealplans = MealPlan::get();

        return view('dashboard.snackedit', compact('snack', 'mealplans'));
    }
}
