<?php

namespace App\Services;

use App\Mail\WelcomeAdminMail;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthService
{
    public function createAdminUser($request)
    {
        try {

            $password = Str::random(10);
            $user = SuperAdmin::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => bcrypt($password),
                'status' => "active"
            ]);

            Mail::to($request->email)->send(new WelcomeAdminMail($user, $password));

            return back()->with('success', "Account created successfully");
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function login($request)
    {
        if (Auth::guard('superadmin')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('superadmin')->user();

            if($user->status === "active"){
                return redirect()->route('admin.dashboard')->with('success', 'Login Successful');
            }else{
                return redirect()->route('login')->with('error', 'You are not a verified user');
            }

        }else {
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }
}


