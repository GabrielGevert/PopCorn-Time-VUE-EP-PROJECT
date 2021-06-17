<?php

// Route::group(['middleware' => ['web']], function () {
//     Route::get('/user', 'App\Http\Controllers\api\UserController@index');
//     Route::post('/user/setUser', 'App\Http\Controllers\api\UserController@register');
//     Route::post('/user/validateEmail', 'App\Http\Controllers\api\UserController@validateEmail');
//     Route::post('/user/login', 'App\Http\Controllers\api\UserController@login');
//     Route::post('/user/logout', 'App\Http\Controllers\api\UserController@logout');
// });

Route::get('/user', 'App\Http\Controllers\api\UserController@index');
Route::get('/user/{user}/getUser', 'App\Http\Controllers\api\UserController@getUser');
Route::post('/user/setUser', 'App\Http\Controllers\api\UserController@register');
Route::post('/user/validateEmail', 'App\Http\Controllers\api\UserController@validateEmail');
Route::post('/user/login', 'App\Http\Controllers\api\UserController@login');
Route::post('/user/logout', 'App\Http\Controllers\api\UserController@logout');
Route::post('/user/recoverPassword', 'App\Http\Controllers\api\UserController@recoverPassword');
Route::post('/user/create-new-password', 'App\Http\Controllers\api\UserController@createNewPassword');
Route::get('/user/{user}/getCreditCard', 'App\Http\Controllers\api\UserController@getCreditCard');
Route::post('/user/{user}/changeCreditCard', 'App\Http\Controllers\api\UserController@changeCreditCard');
Route::post('/user/{user}/add-favorite', 'App\Http\Controllers\api\UserController@addFavoriteMovie');

Route::post('/movies/set-movie', 'App\Http\Controllers\api\MovieController@setMovie');
Route::get('/movies/get-movies', 'App\Http\Controllers\api\MovieController@getMovies');
Route::get('/movies/get-movie/{movie}', 'App\Http\Controllers\api\MovieController@getMovie');
Route::post('/movies/{user}/set-filters', 'App\Http\Controllers\api\MovieController@setFilter');