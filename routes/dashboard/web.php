<?php
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () {
		Route::prefix('dashboard')->name('dashboard.')->group(function () {

			Route::group(['middleware' => 'auth:web'], function () {

				Route::get('/', 'DashboardController@index')->name('welcome');

				Route::resource('users', 'UserController')->except(['show']);
			}); // end of middleware route
		}); // end of dashboard route
	}
);
