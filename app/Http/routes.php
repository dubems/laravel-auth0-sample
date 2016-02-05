<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

    Route::get('/', function () {
        //you can check if user authenticated with Auth::check()
        //if (Auth::check()) dd('LOGGED IN',Auth::user());

        return view('index');

    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('');
    });

});

