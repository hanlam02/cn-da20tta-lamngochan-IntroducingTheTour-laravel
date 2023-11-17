<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Api\Homepage;
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

//Route::prefix('admin')->group(function(){
    Route::get('/Admin',[DashBoardController::class, 'index'])->name('admin.index');
    Route::get('/Category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/Add-category',[CategoryController::class, 'create'])->name('category.create');

    Route::get('/homepage',[Homepage::class, 'homepage']);
//});
    

