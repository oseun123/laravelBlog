<?php

Auth::routes();



// User Routes
Route::group(['namespace' => 'User'], function(){
	Route::get('/','HomeController@index')->name('home');
	Route::get('post/{post}','PostController@post')->name('post');
	Route::get('archive/{created_at}/{slug}','PostController@archive')->name('archive');
	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');


});


// Admin Routes
Route::group(['namespace' => 'Admin'], function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	Route::resource('admin/post','PostController');
	Route::resource('admin/role','RoleController');
	Route::resource('admin/permission','PermissionController');
	Route::resource('admin/user','UserController');
	Route::resource('admin/tag','TagController');
	Route::resource('admin/category','CategoryController');
	Route::resource('admin/archive','ArchiveController');
	Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login','Auth\LoginController@login');
	Route::Post('admin/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::Post('admin/password/reset','Auth\ResetPasswordController@reset');
	Route::get('admin/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

});






