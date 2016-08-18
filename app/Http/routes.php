<?php

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/login/admin', ['as' => 'login', 'uses' => 'UserServiceController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => function(){
	Session::flush();
	return view('auth.login');
}]);
Route::get('/projects/intro', ['as' => 'projects.intro', 'uses' => function(){
	return view('projects.intro');
}]);

Route::resource('projects', 'ProjectServiceController');
