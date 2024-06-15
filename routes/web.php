<?php

use App\Http\Controllers\AdminActionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
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

    Route::prefix('blog')->group(function () {
        Route::get('/category', [BlogController::class, 'category'])->name('admin.blogcategory');
        Route::post('/category', [BlogController::class, 'createCategory'])->name('admin.createblogcategory');
        Route::get('/create', [BlogController::class, 'createBlogView'])->name('admin.createblog');
        Route::post('/create', [BlogController::class, 'storeBlog'])->name('admin.storeblog');
        Route::get('/', [BlogController::class, 'blogView'])->name('admin.viewblog');
        Route::get('/edit/{id}', [BlogController::class, 'blogEdit'])->name('admin.blogedit');
        Route::patch('/update/{id}', [BlogController::class, 'blogUpdate'])->name('admin.updateblog');
        Route::get('/view/{id}', [BlogController::class, 'viewSingleBlog'])->name('admin.viewsingleblog');
        Route::delete('/delete/{id}', [BlogController::class, 'deleteBlog'])->name('admin.blogdelete');

        Route::get('/reels', [BlogController::class, 'reelsView'])->name('admin.viewreels');
        Route::get('/reel/create', [BlogController::class, 'createReelView'])->name('admin.createreel');
        Route::post('/reel/create', [BlogController::class, 'storeReel'])->name('admin.storereel');
    });

    Route::prefix('meal')->group(function () {
        Route::get('/mealplan', [HomeController::class, 'mealPlan'])->name('admin.mealplan');
        Route::post('/mealplan/add', [HomeController::class, 'addMealPlan'])->name('admin.addmealplan');
        Route::get('/view/mealplan/{id}', [HomeController::class, 'viewMealPlan'])->name('admin.mealplanview');
        Route::patch('/update/mealplan/{id}', [HomeController::class, 'updateMealPlan'])->name('admin.updatemealplan');

        //Plan
        Route::get('/plan', [HomeController::class, 'plan'])->name('admin.plan');
        Route::get('/plan/{id}', [HomeController::class, 'planId'])->name('admin.oneplan');
        Route::get('/add-plan', [HomeController::class, 'planAdd'])->name('admin.planadd');
        Route::get('/edit/plan/{id}', [HomeController::class, 'planEdit'])->name('admin.editplan');
        Route::post('create/plan', [AdminActionController::class, 'createPlan'])->name('admin.createplan');
        Route::post('/import/plan', [HomeController::class, 'planImport'])->name('admin.planimport');
        Route::patch('/update/plan/{id}', [AdminActionController::class, 'planUpdate'])->name('admin.updateplan');

        // Snack
        Route::get('/snack', [HomeController::class, 'snack'])->name('admin.snack');
        Route::get('/edit/snack/{id}', [HomeController::class, 'snackEdit'])->name('admin.editsnack');
        Route::patch('/update/snack/{id}', [AdminActionController::class, 'snackUpdate'])->name('admin.updatesnack');
    });


    Route::get('/logout', [AdminActionController::class, 'logout'])->name('admin.logout');
});
