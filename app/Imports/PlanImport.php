<?php

namespace App\Imports;

use App\Models\Plan;
use App\Models\Snack;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlanImport implements ToCollection, WithHeadingRow, WithChunkReading, WithBatchInserts, SkipsEmptyRows
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if($row['proceedure'] !== 0){
                Plan::create([
                    'meal_plan_id' => $row['type'],
                    'name' => $row['name'],
                    'type' => $row['meal_type'],
                    'ingredients' => $row['ingredients'],
                    'calories' => $row['cal_kcals'],
                    'price' => $row['price_1_serving'],
                    'carbohydrate' => $row['carbohydrates_grams'],
                    'protein' => $row['protein_grams'],
                    'fat' => $row['fat_grams'],
                    'procedure' => $row['proceedure']
                ]);
            }

            if($row['proceedure'] === 0){
                Snack::create([
                    'meal_plan_id' => $row['type'],
                    'fruit' => $row['meal_type'],
                    'calories' => $row['name'],
                    'carbs' => $row['ingredients'],
                    'protein' => $row['cal_kcals'],
                    'fat' => $row['price_1_serving']
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array
    {
        return [
            '*.meal_plan_id' => ['required'],
            '*.name' => ['required'],
            '*.type' => ['required'],
            '*.ingredients' => ['required'],
            '*.calories' => ['required'],
            '*.price' => ['required'],
            '*.carbohydrate' => ['required'],
            '*.protein' => ['required'],
            '*.fat' => ['required'],
            '*.procedure' => ['required'],
        ];
    }
}
