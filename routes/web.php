<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('welcome');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('api')->middleware(['auth'])->group(function() {
    Route::get('/home', 'Api\HomeController@index')->name('home');
    Route::post('/items', 'Api\ItemController@store');
    Route::post('/leests', 'Api\LeestController@store');
});

Route::get('/leest/{any?}', function () {
    return view('welcome');
});

Route::get('/{any?}', function () {
    return view('welcome');
});

