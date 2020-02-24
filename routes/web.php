<?php

/**After given a particular URL, here is where we give directions and make the webpage execute some functions by going in the MeatsController*/




/**Redirects to the show.blade view and outputs all the data of a particular item in the database*/
Route::get ('/meat/{meat}/', 'MeatsController@show');

/** Redirects to the create.blade view where the user will be able to add a new item in the database*/
Route::get ('/add/', 'MeatsController@create');
/**Executes the function where it gets the values given by the user and stores the new item in the database*/
Route::post ('/add/', 'MeatsController@store');

/**Deletes a particular item*/
Route::get ('/meat/{meat}/delete/', 'MeatsController@destroy');

/**Redirect to the edit.blade view where the user can see all the details of a particular item*/
Route::get ('/meat/{meat}/edit/','MeatsController@edit');
Route::post ('/meat/{meat}/edit/', 'MeatsController@update');




/**After successfully logging in the user will be directed to the main page*/
Route::get('/home', 'MeatsController@index');
/**After returning a POST method from the home page (where the search bar is) the search function will be executed via the MeatsController and if it fetches anything it will display the fetched data*/
Route::post('/home', 'MeatsController@search');

/**This route is from the logout button. Logs out the user and directs him back to the login.blade view*/
Route::get('/logout','Auth\LoginController@logout');

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');






