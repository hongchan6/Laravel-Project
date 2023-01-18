<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;


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


Route::get('/home', [UserController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'index']);

Route::resource('user', UserController::class);
Route::resource('dish', DishController::class);
Route::resource('order', OrderController::class);
Route::resource('photo', PhotoController::class);


Route::post('/fav_list', [DishController::class, 'favourite']);
Route::get('/fav_list', [DishController::class, 'favList']);
Route::get('/purchase', [OrderController::class, 'purchase']);
Route::get('/top_list', [DishController::class, 'top']);
Route::get('/rest_order', [UserController::class, 'rest_order']);
Route::get('/approvalList', [UserController::class, 'approvalList']);
Route::post('/approvalList', [UserController::class, 'approvalList']);
Route::get('/approveAction/{id}', [UserController::class, 'approveAction']);
Route::post('/approveAction/{id}', [UserController::class, 'approve']);

Route::get('doc', function () {
    return view('doc');
});
require __DIR__.'/auth.php';