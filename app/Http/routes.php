<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/login/admin', ['as' => 'collect.auth', 'uses' => 'UserServiceController@login']);
Route::resource('projects', 'ProjectServiceController');
Route::get('/projects/intro', ['as' => 'projects.intro', 'uses' => function(){
	return view('projects.intro');
}]);

