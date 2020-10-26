<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
		return view('dashboard');
	});

	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});



// Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function(){

// Multi auth using one table 
Route::prefix('/admin')->namespace('Admin')->group(function(){

	// All Admin Routes will be defined here.
	Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard')->middleware('can:admin');
	Route::resource('/users','AdminController')->middleware('can:admin');
	Route::resource('/roles','RoleController');

});



// Multi auth using other table (stackDev)
Route::prefix('/subadmin')->namespace('subAdmin')->group(function(){

	// All superAdmin Routes will be defined here.
	Route::match(['get','post'], '/','AdminLoginController@login');
	Route::get('/login', 'LoginController@subAdminLoginForm')->name('subAdmin.login.form');
	Route::post('/login', 'LoginController@subAdminLogin')->name('subAdmin.login');

});




// Multi auth using other table (personal method)
// Route::prefix('/superadmin')->group(function(){

// 	// All superAdmin Routes will be defined here.
// 	Route::get('/login', 'Auth\LoginController@superAdminLoginForm')->name('superAdmin.login.form');
// 	Route::post('/login', 'Auth\LoginController@superAdminLogin')->name('superAdmin.login');

// });

