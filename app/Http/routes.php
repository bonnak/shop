<?php

Route::group(['middleware' => 'web'], function(){
	Route::get('/auth/register', 'Auth\AuthController@getRegister');
	Route::post('/auth/register', 'Auth\AuthController@postRegister');
	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@postLogin');
	Route::get('/logout', 'Auth\AuthController@logout');

	Route::get('/', 'PageController@home');
});

Route::get('product/create', 'ProductController@create');


Route::group(['namespace' => 'Admin', 
			  'prefix' => 'admin', 
			  'middleware' => 'web'
			 ], function(){
	Route::get('register', 'AdminAuthController@registerGet');
	Route::post('register', 'AdminAuthController@registerPost');
	Route::get('login', 'AdminAuthController@loginGet');
	Route::post('login', 'AdminAuthController@loginPost');

	Route::group(['middleware' => 'auth.admin:admin'], function(){
		Route::get('dashboard', 'DashboardController@index');
	});	
});