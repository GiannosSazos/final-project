<?php


Route::get ('/', 'Auth\LoginController@logout');

Route::get ('/car/{car}/', 'CarController@show');

Route::get ('/add/', 'CarController@create');
Route::post ('/add/', 'CarController@store');

Route::get ('/car/{car}/delete/', 'CarController@destroy');

Route::get ('/car/{car}/edit/','CarController@edit');
Route::post ('/car/{car}/edit/', 'CarController@update');



Auth::routes();

Route::get('/home', 'CarController@index');

Route::get('/logout','Auth\LoginController@logout');
