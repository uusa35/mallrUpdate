<?php
if (env('ABATI')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('MALLR')) {
    Route::get('/', 'HomeController@getMallrHome')->name('index');
    Route::get('/home', 'HomeController@getMallrHome')->name('home');
} elseif (env('HOMEKEY')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('SCRAP')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('ABATI')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('EVENTKM')) {
    Route::get('/', 'HomeController@getEventKmHome')->name('index');
    Route::get('/home', 'HomeController@getEventKmHome')->name('home');
} elseif (env('BITS')) {
    Route::get('/', 'HomeController@getMallrHome')->name('index');
    Route::get('/home', 'HomeController@getMallrHome')->name('home');
} elseif (env('TOYS')) {
    Route::get('/', 'HomeController@getMallrHome')->name('index');
    Route::get('/home', 'HomeController@getMallrHome')->name('home');
} elseif (env('DAILY')) {
    Route::get('/', 'HomeController@getDailyHome')->name('index');
    Route::get('/home', 'HomeController@getDailyHome')->name('home');
} elseif (env('ATSPOT')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('EXPO')) {
    Route::get('/', 'HomeController@getMobileLayout')->name('index');
    Route::get('/home', 'HomeController@getMobileLayout')->name('home');
} elseif (env('HTB')) {
    Route::get('/', 'HomeController@getMallrHome')->name('index');
    Route::get('/home', 'HomeController@getMallrHome')->name('home');
}
