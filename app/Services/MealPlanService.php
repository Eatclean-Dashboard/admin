<?php

namespace App\Services;

use App\Imports\PlanImport;
use App\Models\MealPlan;
use App\Models\Plan;
use Maatwebsite\Excel\Facades\Excel;

class MealPlanService
{
    public function addMealPlan($request)
    {
        try {
            MealPlan::create([
                'name' => $request->name
            ]);

            return back()->with('success', "Created successfully");
        } catch (\Throwable $th) {
            return back()->with('error', $th);
        }
    }

    public function createPlan($request)
    {
        try {

            if ($request->hasFile('image_rectangular')) {
                $file = $request->file('image_rectangular');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $rec = $file->move('rectangular_images', $filename, 'public');
            }else {
                $rec = null;
            }

            if ($request->hasFile('image_oval')) {
                $file = $request->file('image_oval');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $oval = $file->move('oval_images', $filename, 'public');
            }else {
                $oval = null;
            }
            
            Plan::create([
                'meal_plan_id' => $request->meal_plan_id,
                'name' => $request->name,
                'type' => $request->type,
                'ingredients' => $request->ingredients,
                'calories' => $request->calories,
                'price' => $request->price,
                'carbohydrate' => $request->carbohydrate,
                'protein' => $request->protein,
                'fat' => $request->fat,
                'procedure' => $request->procedure,
                'image_rectangular' => $rec,
                'image_oval' => $oval
            ]);

            return back()->with('success', "Created successfully");

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function planImport($request)
    {
        try {
            Excel::import(new PlanImport, $request->file('import_file'));

            return back()->with('success', "Imported successfully");
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}


