<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@getFood');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/register_as_restaurent','auth/resturantRegister')->name('registerasrestaurent');
Route::view('/register_as_customer','auth/registerasCustomer')->name('register_as_customer');
Route::get('/customer/view-food/{id}','MenuController@viewFood');

Route::group(['middleware' => ['auth','customar']], function(){
    Route::post('/customer/add-to-cart/{id}', 'CartController@addCart');
    Route::get('/customer/cart-details','CartController@details');
    Route::get('/delete-from-cart/{id}','CartController@deleteFromCart');
    Route::post('/customer/order-food/{sum}','CartController@order');
    Route::get('/customer/order-history','CartController@orderHistory')->name('orderHistory');
    Route::get('/search','HomeController@search')->name('search');
   
});
//management console panel 
Route::group(['middleware'=>['auth','restaurent']], function () {
    Route::get('/restaurent_admin_panel', 'CartController@restaurentOrder')->name('resadminpanel');
    Route::view('/restaurent/add-menu', 'restaurent/addMenu')->name('addmenu');
    Route::post('/restaurent/add-menu','MenuController@add')->name('additeminmenu');
    Route::get('/restaurent/menu-list','MenuController@list')->name('menulist');
    Route::get('edit-get/food-item/{id}', 'MenuController@getEdit');
    Route::post('/edit/food-item/{id}', 'MenuController@edit');
    Route::get('/delete/food-item/{id}', 'MenuController@delete');
    Route::post('/change-status-to-confirm-shipped/{id}','CartController@updateConfirmStatus');
});