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

//notes controller related


Route::get('Notes/store', 'NoteController@store');
Route::get('/verify/{confirmation_code?}', 'VerifyEmailController@verify');

Route::group(['middleware' => ['web', 'auth']], function () {
    //
	Route::resource('Notes', 'NoteController');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::post('PasswordReset/Submit', 'HomeController@password_reset_submit');
	Route::get('PasswordReset', 'HomeController@password_reset');
	Route::get('/PasswordVerifiyAndReset/{confirmation_code?}', 'VerifyEmailController@verifyandreset');


	Route::get('/', function () {
	    return view('welcome');
	});

    Route::get('/home', 'HomeController@index');
});
