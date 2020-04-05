<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 7/15/17
 * Time: 6:04 PM
 */
Route::group(['middleware' => 'api'], function () {
    Route::post('api/tap/payment', 'Usama\Tap\TapPaymentController@makePaymentApi')->name('tap.api.payment.create');
});


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('tap/payment', 'Usama\Tap\TapPaymentController@makePayment')->name('tap.web.payment.create');
});
Route::group(['middleware' => ['web']], function () {
    Route::get('tap/result', 'Usama\Tap\TapPaymentController@result')->name('tap.web.payment.result');
    Route::get('tap/error', 'Usama\Tap\TapPaymentController@error')->name('tap.web.payment.error');
});




