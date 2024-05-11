<?php

use App\Http\Controllers\AdminActionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('/login', [AdminActionController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'auth:superadmin', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/food', [HomeController::class, 'food'])->name('admin.food');
    Route::post('/food/import', [HomeController::class, 'foodImport'])->name('admin.foodimport');

    Route::get('/user', [AdminController::class, 'user'])->name('admin.users');
    Route::get('/create/user', [AdminController::class, 'adminCreate'])->name('admin.admincreate');
    Route::post('/create/user', [AdminActionController::class, 'adminCreate'])->name('admin.createsuper');
    Route::get('/change-password', [AdminController::class, 'changePassword'])->name('admin.changepassword');
    Route::post('/change-password', [AdminActionController::class, 'changepassword'])->name('admin.passwordchange');

    Route::prefix('users')->group(function () {
        Route::get('/all', [HomeController::class, 'allUsers'])->name('admin.allusers');
        Route::get('/active', [HomeController::class, 'activeUsers'])->name('admin.active');
        Route::get('/inactive', [HomeController::class, 'inactiveUsers'])->name('admin.inactive');
    });

    Route::prefix('meal')->group(function () {
        Route::get('/mealplan', [HomeController::class, 'mealPlan'])->name('admin.mealplan');
        Route::post('/mealplan/add', [HomeController::class, 'addMealPlan'])->name('admin.addmealplan');

        //Plan
        Route::get('/plan', [HomeController::class, 'plan'])->name('admin.plan');
        Route::get('/plan/{id}', [HomeController::class, 'planId'])->name('admin.oneplan');
        Route::get('/add-plan', [HomeController::class, 'planAdd'])->name('admin.planadd');
        Route::post('create/plan', [AdminActionController::class, 'createPlan'])->name('admin.createplan');
        Route::post('/import/plan', [HomeController::class, 'planImport'])->name('admin.planimport');
    });


    Route::get('/logout', [AdminActionController::class, 'logout'])->name('admin.logout');
});
