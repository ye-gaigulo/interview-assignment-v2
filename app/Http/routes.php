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
	$log = array();
	return view('projects.intro')->with('log', $log);
}]);

Route::resource('projects', 'ProjectServiceController');
