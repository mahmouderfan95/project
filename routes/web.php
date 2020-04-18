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
    return redirect('/login');
});
/* front end route */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function(){
        Route::namespace('frontEnd')->group(function(){
            Route::get('/website','frontendController@index');
            Route::get('teamwork','frontendController@team');

        });
    });
/* front end route */




Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
