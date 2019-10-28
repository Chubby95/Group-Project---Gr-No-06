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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' =>  ['auth', 'role:dean']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('user', 'HomeController');
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});

Route::group(['middleware' =>  ['auth', 'role:student']], function () {
    Route::get('/dashboard', 'StudentController@home')->name('dashboard')->middleware('verified');
    Route::resource('user', 'StudentController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'StudentProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'StudentProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'StudentProfileController@password']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', 'AdminController@home')->name('admin')->middleware('verified');
    Route::resource('user', 'AdminController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'AdminProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'AdminProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'AdminProfileController@password']);
});
