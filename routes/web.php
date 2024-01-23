<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'check.role:a']], function () {
	Route::get('listing', ['as' => 'listings.index', 'uses' => 'App\Http\Controllers\ListingController@index']);
    Route::get('listing/create', ['as' => 'listings.create', 'uses' => 'App\Http\Controllers\ListingController@create']);
	Route::post('listing', ['as' => 'listings.store', 'uses' => 'App\Http\Controllers\ListingController@store']);
	Route::get('listing/{id}/edit', ['as' => 'listings.edit', 'uses' => 'App\Http\Controllers\ListingController@edit']);
	Route::put('listing/{id}', ['as' => 'listings.update', 'uses' => 'App\Http\Controllers\ListingController@update']);
	Route::delete('listing/{id}', ['as' => 'listings.destroy', 'uses' => 'App\Http\Controllers\ListingController@destroy']);
});
