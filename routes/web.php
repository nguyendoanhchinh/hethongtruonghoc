<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use  App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'AuthLogin'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/forgot_password',[AuthController::class,'forgotpassword'])->name('forgot_password');
Route::post('/forgot_password',[AuthController::class,'PostForgotpassword'])->name('PostForgotpassword');
Route::get('/reset/{token}',[AuthController::class,'reset']);
Route::post('/reset/{token}',[AuthController::class,'PostReset']);

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('admin/admin/list', function () {
    return view('admin/admin/list');
});

Route::group(['middleware'=>'admin'],function (){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});
Route::group(['middleware'=>'teacher'],function (){
    Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);
});
Route::group(['middleware'=>'student'],function (){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);
});
Route::group(['middleware'=>'parent'],function (){
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);
});
