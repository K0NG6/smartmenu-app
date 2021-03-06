<?php

use App\Http\Controllers\DishesController;
use App\Http\Controllers\MenusController;
use Illuminate\Support\Facades\Route;
use App\Models\Dish;
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
Route::get('/', function (){
    return view('index');
});
Route::get('/dishes', [DishesController::class, 'show']);
Route::get('/dishes/add', [DishesController::class, 'getNewDish']);
Route::post('/dishes/add', [DishesController::class, 'postNewDish']);
Route::get('/dishes/delete/{id}', [DishesController::class, 'deleteDish']);
Route::get('/dishes/edit/{id}', [DishesController::class, 'editDish']);
Route::post('/dishes/edit/{id}', [DishesController::class, 'postEditDish']);

Route::get('/menus', [MenusController::class, 'show']);
