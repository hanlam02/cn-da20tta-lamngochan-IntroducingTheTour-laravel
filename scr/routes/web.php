<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Categorylocations;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\Listbooktour;
use App\Http\Controllers\Admin\search;
use App\Http\Controllers\Api\Homepage;
use App\Http\Controllers\Api\intro;
use App\Http\Controllers\Api\Booking;
use App\Http\Controllers\Api\seach;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\Interfacetour;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\Booktour;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VNpay;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



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


Route::get('/admin', 'App\Http\Controllers\AdminController@login')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\AdminController@postLogin')->name('admin.postLogin');
//Route::get('/admin/index', 'App\Http\Controllers\AdminController@index')->name('admin.index');
//Route::middleware(['web'])->group(function () {
// ... Các route khác ở đây
// Route::get('/admin/index', 'App\Http\Controllers\AdminController@index')->name('admin.index');
//});

//Route::middleware(['admin.auth'])->group(function () {
Route::get('/admin/index', 'App\Http\Controllers\AdminController@index')->name('admin.index');
// });







Route::get('/Category', [CategoryController::class, 'index'])->name('category.index');

//Route::get('/Add-category',[CategoryController::class, 'create'])->name('category.create');
Route::get('/Categorylocation', [Categorylocations::class, 'index'])->name('categorylocations.index');
Route::get('/search', 'App\Http\Controllers\Admin\Categorylocations@search')->name('product.search');
Route::get('/searchde', 'App\Http\Controllers\Api\seach@searchde')->name('detail.search');
Route::get('/searcht', 'App\Http\Controllers\Admin\CategoryController@searcht')->name('global.search');

Route::get('/revenue', 'App\Http\Controllers\Admin\Revenue@index')->name('revenue');

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




Route::get('/homepage', [Homepage::class, 'homepage'])->name('homepage');
Route::get('/detail/{id_tour}', [Homepage::class, 'detail'])->name('detail');
Route::get('/login', [loginController::class, 'login'])->name('login.login');
// Route::get('/regiter',[loginController::class, 'regiter'])->name('regiter');
// Route::get('/user',[UsersController::class, 'show']);
//});

Route::get('/interfacetour', [Interfacetour::class, 'index'])->name('interfacetour');
Route::match(['get', 'post'], '/booktour/{id_tour}', [Booktour::class, 'booktour'])->name('booktour');
Route::match( ['get', 'post'],'/store', [Booktour::class, 'store'])->name('booktour.store');
Route::match(['get', 'post'], '/search-booktour', [Booktour::class, 'searchBookTour'])->name('seach');
Route::get('/cancel-booking/{id_booktour}', [Booktour::class, 'cancelBooking'])->name('cancelBooking');
// Route::prefix('booktour')->group(function () {
//     Route::get('/booktour/{id_tour}', [
//         'as' => 'booktour',
//         'uses' => 'App\Http\Controllers\Api\Booktour@booktour'
//     ]);
//     Route::post('/booktour/store', [
//         'as' => 'booktour.store',
//         'uses' => 'App\Http\Controllers\Api\Booktour@store'
//     ]);

// });
Route::get('/listbooktour', [Listbooktour::class, 'index'])->name('listbooktour');
Route::get('/confirm-booking/{confirmation_code}', 'App\Http\Controllers\Api\BookingController@confirmBooking')->name('confirm-booking');

Route::get('/hanoi', [intro::class, 'hn'])->name('hanoi');


Route::post('/vnpay_payment', [VNpay::class, 'VNP']);

Route::post('/luuthongtin', [Booking::class,'luuThongTin']);