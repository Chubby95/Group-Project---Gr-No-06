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

use App\Http\Controllers\ClarkController;
use Symfony\Component\Routing\Router;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' =>  ['auth', 'role:dean']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});

Route::group(['middleware' =>  ['auth', 'role:head-of-the-department']], function () {
    Route::get('hod/dashboard', 'HodController@index')->name('hod/dashboard')->middleware('verified');
    Route::get('hod/profile', ['as' => 'hod.profile.edit', 'uses' => 'HodProfileController@edit']);
    Route::put('hod/profile', ['as' => 'hod.profile.update', 'uses' => 'HodProfileController@update']);
    Route::put('hod/profile/password', ['as' => 'hod.profile.password', 'uses' => 'HodProfileController@password']);
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});

Route::group(['middleware' =>  ['auth', 'role:student']], function () {
    Route::get('/dashboard', 'StudentController@home')->name('dashboard')->middleware('verified');
    Route::get('dashboard/profile', ['as' => 'dashboard.profile.edit', 'uses' => 'StudentProfileController@edit']);
    Route::put('dashboard/profile', ['as' => 'dashboard.profile.update', 'uses' => 'StudentProfileController@update']);
    Route::put('dashboard/profile/password', ['as' => 'dashboard.profile.password', 'uses' => 'StudentProfileController@password']);
    Route::get('dashboard/form/renew', 'StudentController@renew')->name('dashboard/form/renew')->middleware('verified');
    Route::put('dashboard/renew', ['as' => 'dashboard.renew.store', 'uses' => 'StudentController@renewstore']);
    Route::get('dashboard/form/confirmation', 'StudentController@confirmation')->name('dashboard/form/confirmation')->middleware('verified');
    Route::put('dashboard/confirmation', ['as' => 'dashboard.confirmation.store', 'uses' => 'StudentController@confirmationstore']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', 'AdminController@home')->name('admin')->middleware('verified');
    Route::resource('user', 'AdminController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'AdminProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'AdminProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'AdminProfileController@password']);
});


Route::group(['middleware'=>['auth','role:dean-office-clark']],function(){
    Route::get('clark/dashboard','ClarkController@index')->name('clark/dashboard')->middleware('verified');
    Route::resource('clark/departments','DepartmentController');
    Route::resource('clark/courses', 'CourseController');
    Route::resource('clark/lectures', 'LectureController');
    Route::resource('clark/subjects', 'SubjectController');
});
