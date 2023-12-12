<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Categorylocations;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\CategoryLoginController;
use App\Http\Controllers\Api\Homepage;
use App\Http\Controllers\UsersController;
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
    //Route::get('/Add-category',[CategoryController::class, 'create'])->name('category.create');
    Route::get('/Categorylocation',[Categorylocations::class, 'index'])->name('categorylocations.index');
    //Route::get('/Add-categorylocation',[Categorylocations::class, 'create'])->name('categorylocations.create');
//Location    
    Route::prefix('location')->group(function () {
        Route::get('/', [
            'as' => 'location.index',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@index'
        ]);
        Route::get('/create', [
            'as' => 'location.create',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@create'
        ]);
        Route::post('/store', [
            'as' => 'location.store',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@store'
        ]);
        Route::get('/edit/{id_location}', [
            'as' => 'location.edit',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@edit',
        ]);
        Route::put('/update/{id_location}', [
            'as' => 'location.update',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@update'
        ]);
        Route::get('/delete/{id_location}', [
            'as' => 'location.delete',
            'uses' => 'App\Http\Controllers\Admin\Categorylocations@delete',
        ]);
    });

//tour    
    Route::prefix('tour')->group(function () {
        Route::get('/', [
            'as' => 'tour.index',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@index'
        ]);
        Route::get('/create', [
            'as' => 'tour.create',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@create'
        ]);
        Route::post('/store', [
            'as' => 'tour.store',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@store'
        ]);
        Route::get('/edit/{id_tour}', [
            'as' => 'tour.edit',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@edit',
        ]);
        Route::put('/update/{id_tour}', [
            'as' => 'tour.update',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@update'
        ]);
        Route::get('/destroy/{id_tour}', [
            'as' => 'tour.delete',
            'uses' => 'App\Http\Controllers\Admin\CategoryController@destroy',
        ]);
    });


    

    Route::get('/homepage',[Homepage::class, 'homepage']);
    Route::get('/detail/{nametour}',[Homepage::class, 'detail'])->name('detail');
    Route::get('/login',[loginController::class, 'login'])->name('login.login');
   // Route::get('/regiter',[loginController::class, 'regiter'])->name('regiter');
   // Route::get('/user',[UsersController::class, 'show']);
//});
    

