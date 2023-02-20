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

route::post('newregister','userController@newregister');
route ::post('userLogin','userController@userLogin');
Route::get('testing','userController@profile');
route::get('/logout','userController@logout');


Route::POST('savedetails','detailsController@savedetails');
Route::POST('saveposts','detailsController@saveposts');
Route::POST('savepp','detailsController@savedetails');
Route::get('/loadprofile','detailsController@profileindex');
Route::POST('saveownermap' , 'geoController@saveownermap');
Route::POST('savecurrentmap' , 'geoController@savecurrentmap');
Route::resource('post','PostController');
Route::post('savepp','detailsController@store');

Route::get('/','detailsController@home');
Route::get('/home','detailsController@home');
route::view('home','home');
// route::view('home','/');


route::view('alertwindow','alertwindow')
;
// Route::get('/{user}','detailsController@show');

Route::view('profile','users/profile');

 



