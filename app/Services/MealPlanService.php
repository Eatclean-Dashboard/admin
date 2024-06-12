<?php

namespace App\Services;

use App\Imports\PlanImport;
use App\Models\MealPlan;
use App\Models\Plan;
use App\Models\Snack;
use Maatwebsite\Excel\Facades\Excel;

class MealPlanService
{
    public function addMealPlan($request)
    {
        try {

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $file->move('meal_plan_image', $filename, 'public');
                $mealplan_path = config('services.base_url') . 'meal_plan_image/' . $filename;

            }else {
                $mealplan_path = null;
            }

            MealPlan::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $mealplan_path
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

        if($request->hasFile('image')){

            if ($meal->image) {
                $filename = basename($meal->image);
                $oldPath = public_path('meal_plan_image/' . $filename);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('image');
            $filename = time() . rand(10, 1000) . '.' . $file->extension();
            $file->move('meal_plan_image', $filename, 'public');
            $mealplan_path = config('services.base_url') . 'meal_plan_image/' . $filename;

        }else {
            $mealplan_path = $meal->image;
        }

        $meal->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $mealplan_path
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
                $rec_path = $plan->image_rectangular;
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
                $oval_path = $plan->image_oval;
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

    public function snackUpdate($request, $id)
    {
        $snack = Snack::findOrFail($id);

        try {

            if ($request->hasFile('image')) {

                if ($snack->image) {
                    $filename = basename($snack->image);
                    $oldPath = public_path('snack_images/' . $filename);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file('image');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $rec = $file->move('snack_images', $filename, 'public');
                $rec_path = config('services.base_url') . $rec;
            }else {
                $rec_path = $snack->image;
            }

            $snack->update([
                'meal_plan_id' => $request->meal_plan_id,
                'fruit' => $request->fruit,
                'calories' => $request->calories,
                'carbs' => $request->carbs,
                'protein' => $request->protein,
                'fat' => $request->fat,
                'image' => $rec_path
            ]);

            return back()->with('success', "Updated successfully");

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}


