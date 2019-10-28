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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');


Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'StudentController');
    Route::get('profile', ['as' => 'admin.profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'admin.profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'admin.profile.password', 'uses' => 'ProfileController@password']);
});
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', 'AdminController@home')->name('admin')->middleware('verified');
    Route::resource('user', 'AdminController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'AdminProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'AdminProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'AdminProfileController@password']);
});
