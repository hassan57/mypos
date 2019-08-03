<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes(['register' => false]);

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/', function () {

            return view('welcome');
        });
    }
);
