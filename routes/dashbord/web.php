<?php

/* dashbord routes */
/* ================== */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::prefix('dashbord')->middleware(['auth'])->name('dashbord.')->namespace('Dashbord')->group(function(){
            Route::get('/','dashbordController@index')->name('index');
            /* users route */
            Route::resource('/users','UserController');

            /* categories route */
            Route::resource('/categoryies','categoryController')->except(['show']);

            /* products route */
            Route::resource('/products','ProductController')->except(['show']);

            /* clients route */
            Route::resource('/clients','ClientController')->except(['show']);
        });

    });



/* ================== */
/* map dashbord route */

?>
