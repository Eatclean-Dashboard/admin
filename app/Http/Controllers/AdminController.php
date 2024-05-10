<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $allUsers = SuperAdmin::paginate(25);

        return view('dashboard.adminuser', compact('allUsers'));
    }

    public function changePassword()
    {
        return view('dashboard.changepassword');
    }

    public function adminCreate()
    {
        return view('dashboard.admincreate');
    }
}
