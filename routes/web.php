
<?php
Use App\User;
/**After given a particular URL, here is where we give directions and make the webpage execute some functions by going in the MeatsController*/
Route::get('/', 'MeatsController@index');


/**Redirects to the show.blade view and outputs all the data of a particular item in the database*/
Route::get ('/meat/{meat}/', 'MeatsController@show');

/** Redirects to the create.blade view where the user will be able to add a new item in the database*/
Route::get ('/add/', 'MeatsController@create')->middleware(['auth.admin']);

/**Executes the function where it gets the values given by the user and stores the new item in the database*/
Route::post ('/add/', 'MeatsController@store')->middleware(['auth.admin']);

/**Deletes a particular item*/
Route::get ('/meat/{meat}/delete/', 'MeatsController@destroy')->middleware(['auth.admin']);

/**Redirect to the edit.blade view where the user can see all the details of a particular item*/
Route::get ('/meat/{meat}/edit/','MeatsController@edit')->middleware(['auth.admin']);

/**Edit the item's data*/
Route::post ('/meat/{meat}/edit/', 'MeatsController@update')->middleware(['auth.admin']);




/**After successfully logging in the user will be directed to the main page*/
Route::get('/home', 'MeatsController@index');

/**After returning a POST method from the home page (where the search bar is) the search function will be executed via the MeatsController
 * and if it fetches anything it will display the fetched data*/
Route::post('/home', 'MeatsController@search');

/**This route is from the logout button. Logs out the user and directs him back to the login.blade view*/
Route::get('/logout','Auth\LoginController@logout');


Auth::routes(['verify' => true]);
//Route::get('profile', function () {
//    // Only verified users may enter...
//})->middleware('verified');


/**User Routes*/

Route::get ('/user/{user}/', 'UsersController@show')->middleware(['auth.adminEmployee']);

Route::get ('/my_profile', 'UsersController@showMe');
Route::get ('/edit_my_profile', 'UsersController@editMe');
Route::post ('/edit_my_profile', 'UsersController@updateMe');

Route::get ('/user/{user}/edit', 'UsersController@edit')->middleware(['auth.admin']);
Route::post ('/user/{user}/edit', 'UsersController@update')->middleware(['auth.admin']);
Route::get ('/admin_panel', 'UsersController@index')->middleware(['auth.adminEmployee']);
Route::get ('/register', 'UsersController@create')->middleware(['auth.admin']);
Route::post ('/register', 'UsersController@store')->middleware(['auth.admin']);
Route::get('/my_orders','UsersController@myOrders')->middleware(['auth.hasRestaurant']);

Route::get ('/user/{user}/delete/', 'UsersController@destroy')->middleware(['auth.admin']);

/**Basket Route*/
Route::get('/basket','MeatsController@showBasket')->middleware(['auth.hasRestaurant']);
Route::get('/add_to_basket/{id}','MeatsController@addToBasket')->middleware(['auth.hasRestaurant']);


Route::get ('/increase_kg/{id}/', 'MeatsController@increaseKgItem')->middleware(['auth.hasRestaurant']);
Route::get ('/decrease_kg/{id}/', 'MeatsController@decreaseKgItem')->middleware(['auth.hasRestaurant']);
Route::get ('/remove/{id}/', 'MeatsController@removeFromBasket')->middleware(['auth.hasRestaurant']);
Route::get ('/cancel/order/{order}', 'MeatsController@cancelOrder')->middleware(['auth.admin']);
Route::get ('/delivered/order/{order}', 'MeatsController@orderDelivered')->middleware(['auth.adminEmployee']);


Route::get('/checkout/', 'MeatsController@checkout')->middleware(['auth.hasRestaurant']);
Route::post('/checkout/', 'MeatsController@postCheckout')->middleware(['auth.hasRestaurant']);








