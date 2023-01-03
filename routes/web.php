<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function(){
Route::get('admin/dashboard',DashboardController::class)->name('admin.dashboard');
Route::resource('admin/users',UserController::class);
Route::get('admin/users/delete/{id}',[UserController::class,'destroy'])->name('admin.destroy');
});


