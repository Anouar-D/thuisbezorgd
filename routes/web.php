<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();
// custom links to various links
Route::get('/user/mydetails', 'UserController@showDetails')->name('details')->middleware('auth');
Route::get('/user/myorders', 'UserController@showOrders')->name('myOrders')->middleware('auth');
Route::get('/user/myrestaurant', 'UserController@showRestaurant')->name('myRestaurant')->middleware('auth');
Route::get('/user/password', 'UserController@showPasswordField')->name('myPassword')->middleware('auth');
Route::patch('/user/password/update', 'UserController@changePassword')->name('changePassword')->middleware('auth');
Route::post('/search', 'RestaurantController@search')->name('search');
// end custom links

// cart routes
Route::get('/cart', 'ShoppingcartController@cart')->name('cart')->middleware('auth');
Route::post('/cart', 'ShoppingcartController@addToCart')->name('cart.add')->middleware('auth');
// end cart routes

// resouce links
Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/restaurants', 'RestaurantController')->middleware('auth');
Route::resource('/order', 'OrderController')->middleware('auth');
Route::resource('/consumable', 'ConsumableController')->middleware('auth');
// end resource links