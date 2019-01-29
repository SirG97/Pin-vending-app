<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Protect the page from unathorized users
Route::middleware(['auth'])->group(function(){
    Route::get('/generate', function(){
     return view('generate');
    });

    Route::get('/generated', function(){
        return view('generated');
    });

    Route::post('/generated', 'PinController@setLivePin');

    Route::get('/history', function(){
        return view('history');
    });

    Route::get('/used', function(){
        return view('used');
    });

    Route::get('/live', function(){
        return view('live');
    });

    Route::resource('pins', 'PinController');
});

    Route::get('/test', function(){
        return view('test');
    });

    Route::get('logout', function(){
        Auth::logout();
        return Redirect::to('');
    });
