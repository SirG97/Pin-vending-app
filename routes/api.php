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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:api'], function(){
//     // get list of tasks
//     Route::get('pins','pinapiController@index');
//     // get specific task
//     Route::get('pin/{id}','pinapiController@show');
//     // create new task
//     Route::post('pin','pinapiController@store');
//     // update existing task
//     Route::put('pin','pinapiController@store');
//     // delete a task
//     //Route::delete('task/{id}','TaskController@destroy');
// });

Route::post('register', 'API\RegisterController@register');
Route::middleware('auth:api')->group(function(){
    Route::resource('pins', 'API\PinController');
});
