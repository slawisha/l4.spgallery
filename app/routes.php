<?php

Event::listen('illuminate.query', function($query){
	//var_dump($query);
});

Route::get('atest', function(){
	return App::make('path.public') . '/atest';

});
Route::get('/', 'PagesController@index');

Route::get('login',['as' => 'login', 'uses' => 'PagesController@login']);

Route::get('logout', array('as'=>'logout', 'uses' => 'PagesController@logout'));

Route::post('authenticate', array('as'=>'authenticate', 'uses'=>'PagesController@authenticate'));

Route::resource('users','UsersController');

Route::resource('galleries','GalleriesController');

Route::get('password_resets/reset/{token}', ['uses'=>'PasswordResetsController@reset']);

Route::post('password_resets/reset/{token}', ['uses'=>'PasswordResetsController@postReset']);

Route::resource('password_resets','PasswordResetsController');

Route::post('images/delete/{id}', ['as'=>'deleteimage', 'uses'=>'ImagesController@destroy']);

Route::get('atest', function(){
	//echo public_path();
	echo URL::to('/');
});





