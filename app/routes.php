<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home
Route::get('/', array('as'=>'home', function() {
    return View::make('index');
}));

// This is a secured url
Route::get('users', array('before' => 'auth', function() {
    $users = User::all();
    return View::make('users')->with('users', $users);
}));

// Configure the auth0 callback
Route::get('/auth0/callback', 'Auth0\Login\Auth0Controller@callback');

Route::get('/login', function() {
    return View::make('login');
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::home();
});

// This is the hook from the plugin that lets us know that a user has logged in
// and we should either return the real db user or create a new one
// This should be somewhere else.
Auth0::onLogin(function($auth0User) {

    // See if the user exists
    $user = User::where("auth0id", $auth0User->user_id)->first();
    if ($user === null) {
        // If not, create one
        $user = new User();
        $user->email = $auth0User->email;
        $user->auth0id = $auth0User->user_id;
        $user->nickname = $auth0User->nickname;
        $user->name = $auth0User->name;
        $user->save();
    }
    return $user;
});
