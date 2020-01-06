<?php


Route::get ('/', 'CarController@index');

Route::get ('/car/{car}/', 'CarController@show');

Route::get ('/add/', 'CarController@create');
Route::post ('/add/', 'CarController@store');

Route::get ('/car/{car}/delete/', 'CarController@destroy');

Route::get ('/car/{car}/edit/','CarController@edit');
Route::post ('/car/{car}/edit/', 'CarController@update');


