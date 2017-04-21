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

Route::get('/register', function () {
    return View('register');
});

Route::post('/register', function () {
    	$user = new App\User;
	$user->email = Input::get('email');
	$user->username = Input::get('username');
	$user->password = Hash::make(Input::get('password'));
	$user->save();
	$theEmail = Input::get('email');
	return View::make('thanks')->with('theEmail',$theEmail);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
