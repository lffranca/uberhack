<?php

use Illuminate\Http\Request;

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

/** UserController */
Route::post('user/register', ['as' => 'user.register', 'uses'=>'UserController@register']);
Route::resource('user', 'UserController', ['only' => ['show']]);

/** ModalController */
Route::resource('modal', 'ModalController', ['only' => ['index', 'show']]);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
 */

Route::group(['middleware' => 'auth'], function () {
    /** UserController */
    Route::get('auth/user', ['as' => 'auth.user', 'uses' => 'AuthController@user']);
    Route::resource('user', 'UserController', ['only' => ['update', 'destroy']]);

    /** RideRatingController */
    Route::post('ride/rating', ['as' => 'ride_rating.store', 'uses' => 'RideRatingController@store']);

});