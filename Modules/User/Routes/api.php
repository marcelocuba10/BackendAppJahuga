<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Api\GroundApiController;
use Modules\User\Http\Controllers\OrderController;

Route::group(['prefix' => 'auth'], function () {

    Route::group(['middleware' => ['guest']], function () {
        Route::post('login', 'Api\Auth\AuthController@login')->name('login');
        Route::post('register', 'Api\Auth\AuthController@register');
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\Auth\AuthController@logout');
        Route::get('user', 'Api\Auth\AuthController@user');
    });

});

Route::middleware(['cors'])->group(function () {
    Route::resource('orders','OrderController');
    Route::get('grounds',[GroundApiController::class,'index']);
    Route::get('grounds/{id}',[GroundApiController::class,'edit']);
});