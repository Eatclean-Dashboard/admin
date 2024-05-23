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
                'name' => $request->name,
                'description' => $request->description
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
                $rec_path = config('services.base_url') . $rec;
            }else {
                $rec_path = null;
            }

            if ($request->hasFile('image_oval')) {
                $file = $request->file('image_oval');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $oval = $file->move('oval_images', $filename, 'public');
                $oval_path = config('services.base_url') . $oval;
            }else {
                $oval_path = null;
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
                'image_rectangular' => $rec_path,
                'image_oval' => $oval_path
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

    public function updateMealPlan($request, $id)
    {
        $meal = MealPlan::findOrFail($id);

        $meal->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return back()->with('success', "Updated successfully");
    }

    public function updatePlan($request, $id)
    {
        $plan = Plan::findOrFail($id);

        try {

            if ($request->hasFile('image_rectangular')) {

                if ($plan->image_rectangular) {
                    $filename = basename($plan->image_rectangular);
                    $oldPath = public_path('rectangular_images/' . $filename);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file('image_rectangular');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $rec = $file->move('rectangular_images', $filename, 'public');
                $rec_path = config('services.base_url') . $rec;
            }else {
                $rec_path = null;
            }

            if ($request->hasFile('image_oval')) {

                if ($plan->image_oval) {
                    $filename = basename($plan->image_oval);
                    $oldPath = public_path('oval_images/' . $filename);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file('image_oval');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $oval = $file->move('oval_images', $filename, 'public');
                $oval_path = config('services.base_url') . $oval;
            }else {
                $oval_path = null;
            }

            $plan->update([
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
                'image_rectangular' => $rec_path,
                'image_oval' => $oval_path
            ]);

            return back()->with('success', "Updated successfully");

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}


