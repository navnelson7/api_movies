<?php

use App\Http\Controllers\DetailrentalController;
use App\Http\Controllers\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//add route to endpoint MoviesController
//get all movies
Route::get('movies','MoviesController@index')->name('movies');
//get one movie
Route::get('/movies/{id}','MoviesController@show');
//store movies
Route::post('/movies/store',['middleware' =>'auth.role:admin',
'uses' =>'MoviesController@store']);
//delete movies
Route::delete('/movies/{id}',['middleware' => 'auth.role:admin',
'uses' =>'MoviesController@destroy']);
//updat Movie
Route::put('/movies/{id}',['middleware' => 'auth.role:admin',
'uses' =>'MoviesController@update']);

//add route to endpoint Stock
Route::get('stock','StockController@index')->name('stock');
Route::post('/stock/store',['middleware' => 'auth.role:admin,user',
'uses' =>'StockController@store']);
Route::get('/stock/{id}','StockController@show');
Route::delete('/stock/{id}','StockController@destroy');

//add route to endpoint Rentals
Route::get('rentals','RentalController@index')->name('rentals');
Route::post('/rentals/store',['middleware' => 'auth.role:admin,user',
'uses' =>'RentalController@store']);

//add route to endpoint retals details
Route::get('rental_detail','DetailrentalController@index')->name('rental_detail');
Route::post('/rental_detail/store',['middleware' => 'auth.role:admin,user',
'uses' =>'DetailrentalController@store']);

// routes not require token validate.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

//routes require a valid token to be accessed.
Route::group(['middleware', 'auth.jwt'], function(){
    Route::post('/logout','AuthController@logout');
});