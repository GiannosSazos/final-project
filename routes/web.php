<?php

/**After given a particular URL, here is where we give directions and make the webpage execute some functions by going in the CarController*/

/**This route will logout the user and redirect him back to the login page*/
Route::get ('/', 'Auth\LoginController@logout');


/**Redirects to the show.blade view and outputs all the data of a particular item in the database*/
Route::get ('/car/{car}/', 'CarController@show');

/** Redirects to the create.blade view where the user will be able to add a new item in the database*/
Route::get ('/add/', 'CarController@create');
/**Executes the function where it gets the values given by the user and stores the new item in the database*/
Route::post ('/add/', 'CarController@store');

/**Deletes a particular item*/
Route::get ('/car/{car}/delete/', 'CarController@destroy');

/**Redirect to the edit.blade view where the user can see all the details of a particular item*/
Route::get ('/car/{car}/edit/','CarController@edit');
Route::post ('/car/{car}/edit/', 'CarController@update');



Auth::routes();
/**After successfully logging in the user will be directed to the main page*/
Route::get('/home', 'CarController@index');
/**After returning a POST method from the home page (where the search bar is) the search function will be executed via the CarController and if it fetches anything it will display the fetched data*/
Route::post('/home', 'CarController@search');

/**This route is from the logout button. Logs out the user and directs him back to the login.blade view*/
Route::get('/logout','Auth\LoginController@logout');






