<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {

    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function () {

        /*** Register Routes ***/
        Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
        Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');

        /*** Login Routes ***/
        Route::get('/login', 'Auth\LoginController@show')->name('login.show');
        Route::post('/login', 'Auth\LoginController@login')->name('login.perform');

        /*** forgot - reset password ***/
        Route::get('/recovery-options', 'Auth\ForgotPasswordController@showRecoveryOptionsForm')->name('user.recovery.options.get');
        Route::get('/forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('user.forget.password.get');
        Route::post('/forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('user.forget.password.post');
        Route::get('/reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('user.reset.password.get');
        Route::post('/reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('user.reset.password.post');
    });

    Route::group(['middleware' => ['auth:web']], function () {

        Route::get('/dashboard', 'HomeController@index')->name('user.dashboard');
        Route::get('/logout', 'Auth\LogoutController@perform')->name('logout.perform');

        /*** Users Routes ***/
        Route::group(['prefix' => 'users'], function () {

            Route::get('/profile/{user}', 'UserController@showProfile')->name('users_.show.profile');
            Route::get('/edit/profile/{id}', 'UserController@editProfile')->name('users_.edit.profile');
            Route::put('/update/profile/{id}', 'UserController@updateProfile')->name('users_.update.profile');
        });
    });
});
