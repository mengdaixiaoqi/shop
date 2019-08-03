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

Route::get('/', 'PagesController@root')->name('root');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');
    Route::get('/email_verify_notice','PagesController@emailVerifyNotice')->name('email_verify_notice');

    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    // 开始
    Route::group(['middleware' => 'email_verified'], function() {
        Route::get('user_addresses','UserAdderssesController@index')->name('user_addresses.index');
        Route::get('user_addresses/create','UserAdderssesController@create')->name('user_addresses.create');
        Route::post('user_addresses', 'UserAdderssesController@store')->name('user_addresses.store');
        Route::get('user_addresses/{user_address}', 'UserAdderssesController@edit')->name('user_addresses.edit');
        Route::put('user_addresses/{user_address}','UserAdderssesController@update')->name('user_addresses.update');
        Route::delete('user_addresses/{user_address}','UserAdderssesController@destroy')->name('user_addresses.destroy');


    });
    // 结束
});
