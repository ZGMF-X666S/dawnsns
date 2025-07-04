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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/post/create','PostsController@create');
Route::get('/post/{id}/delete','PostsController@delete');
Route::post('/post/update','PostsController@update');


Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

Route::post('/search','UsersController@search');

Route::post('/add-follow','FollowsController@add');
Route::post('/remove-follower','FollowsController@remove');

Route::post('/profile','UsersController@profile');
Route::post('/userupdate','UsersController@userupdate');

Route::patch('/profile','UsersController@profile');

Route::post('/otherProfile','UsersController@otherProfile');


Route::post('/tenkyouken','GundamController@tenkyouken');

Route::delete('/moviebullet','GundamController@moviebullet');
