<?php

namespace App\Services;

use App\Imports\FoodImport;
use Maatwebsite\Excel\Facades\Excel;

class FoodService
{
    public function foodImport($request)
    {
        try {
            Excel::import(new FoodImport, $request->file('import_file'));

            return back()->with('success', "Imported successfully");
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}


