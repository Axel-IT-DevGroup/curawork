<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user-connections'], static function () {
//    Route::get('/', 'UserConnectionController@index');
    Route::put('/{id}', 'UserConnectionController@update');
    Route::get('/', 'UserConnectionController@store');
});
