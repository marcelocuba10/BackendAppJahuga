<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\QrCodeController;

Route::prefix('user')->group(function () {

    /** Dashboard */
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function () {

        /*** Register Routes ***/
        // Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
        // Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');

        /*** Login Routes ***/
        Route::get('/login', 'Auth\LoginController@show');
        Route::post('/login', 'Auth\LoginController@login');

        /*** forgot - reset password ***/
        Route::get('/recovery-options', 'Auth\ForgotPasswordController@showRecoveryOptionsForm');
        Route::get('/forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm');
        Route::post('/forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm');
        Route::get('/reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm');
        Route::post('/reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm');
    });

    Route::group(['middleware' => ['auth:web']], function () {

        /** Dashboard */
        Route::get('/dashboard', 'HomeController@index');
        Route::get('/logout', 'Auth\LogoutController@perform');

        /*** Notifications Routes ***/
        Route::group(['prefix' => 'notifications'], function () {
            Route::get('/', 'NotificationsController@index');
            Route::get('/create', 'NotificationsController@create');
            Route::post('/create', 'NotificationsController@store');
            Route::get('/{id}/show', 'NotificationsController@show');
            Route::get('/edit/{id}', 'NotificationsController@edit');
            Route::put('/update/{id}', 'NotificationsController@update');
            Route::delete('/{id}/delete', 'NotificationsController@destroy');
            Route::get('/search', 'NotificationsController@search');
        });

        /** Records Routes*/
        Route::group(['prefix' => 'records'], function () {

            /*** User Routes ***/
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'UserController@index');
                Route::get('/create', 'UserController@create');
                Route::post('/create', 'UserController@store');
                Route::get('/show/{id}', 'UserController@show');
                Route::get('/edit/{id}', 'UserController@edit');
                Route::put('/update/{id}', 'UserController@update');
                Route::delete('/delete/{id}', 'UserController@destroy');
                Route::get('/profile/{id}', 'UserController@showProfile');
                Route::get('/edit/profile/{id}', 'UserController@editProfile');
                Route::put('/update/profile/{id}', 'UserController@updateProfile');
                Route::get('/search', 'UserController@search');
            });

            /*** Customers Routes ***/
            Route::group(['prefix' => 'customers'], function () {
                Route::get('/', 'CustomersController@index');
                Route::get('/create', 'CustomersController@create');
                Route::post('/create', 'CustomersController@store');
                Route::get('/show/{id}', 'CustomersController@show');
                Route::get('/edit/{id}', 'CustomersController@edit');
                Route::put('/update/{id}', 'CustomersController@update');
                Route::delete('/delete/{id}', 'CustomersController@destroy');
                Route::get('/search', 'CustomersController@search');
            });

            /*** Grounds Routes ***/
            Route::group(['prefix' => 'grounds'], function () {
                Route::get('/', 'GroundController@index');
                Route::get('/create', 'GroundController@create');
                Route::post('/create', 'GroundController@store');
                Route::get('/show/{id}', 'GroundController@show');
                Route::get('/edit/{id}', 'GroundController@edit');
                Route::put('/update/{id}', 'GroundController@update');
                Route::delete('/delete/{id}', 'GroundController@destroy');
                Route::get('/search', 'GroundController@search');
            });
        });

        /*** Bookings Routes ***/
        Route::group(['prefix' => 'bookings'], function () {
            Route::get('/', 'BookingController@index');
            Route::get('/create', 'BookingController@create');
            Route::post('/create', 'BookingController@store');
            Route::get('/show/{id}', 'BookingController@show');
            Route::get('/edit/{id}', 'BookingController@edit');
            Route::put('/update/{id}', 'BookingController@update');
            Route::delete('/delete/{id}', 'BookingController@destroy');
            Route::get('/search', 'BookingController@search');
        });

        /*** Schedules Routes ***/
        Route::group(['prefix' => 'schedules'], function () {
            Route::get('/', 'SchedulesController@index');
            Route::get('/create', 'SchedulesController@create');
            Route::post('/create', 'SchedulesController@store');
            Route::get('/{id}/show', 'SchedulesController@show');
            Route::get('/edit/{id}', 'SchedulesController@edit');
            Route::put('/update/{id}', 'SchedulesController@update');
            Route::delete('/{id}/delete', 'SchedulesController@destroy');
            Route::get('/search', 'SchedulesController@search');
        });

        /*** Reports Routes ***/
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/customers', 'ReportsController@customers');
            Route::get('/customers/search', 'ReportsController@customers');
            Route::get('/machines', 'ReportsController@machines');
            Route::get('/users', 'ReportsController@users');
            Route::get('/schedules', 'ReportsController@schedules');
        });

        /*** ACL Routes ***/
        Route::group(['prefix' => 'ACL'], function () {
            Route::group(['prefix' => 'roles'], function () {
                Route::get('/', 'ACL\RolesController@index');
                Route::get('/create', 'ACL\RolesController@create');
                Route::post('/create', 'ACL\RolesController@store');
                Route::get('/show/{id}', 'ACL\RolesController@show');
                Route::get('/edit/{id}', 'ACL\RolesController@edit');
                Route::put('/update/{id}', 'ACL\RolesController@update');
                Route::delete('/delete/{id}', 'ACL\RolesController@destroy');
                Route::get('/search', 'ACL\RolesController@search');
            });

            Route::group(['prefix' => 'permissions'], function () {
                Route::get('/', 'ACL\PermissionsController@index');
                Route::get('/create', 'ACL\PermissionsController@create');
                Route::post('/create', 'ACL\PermissionsController@store');
                Route::get('/show/{id}', 'ACL\PermissionsController@show');
                Route::get('/edit/{id}', 'ACL\PermissionsController@edit');
                Route::put('/update/{id}', 'ACL\PermissionsController@update');
                Route::delete('/delete/{id}', 'ACL\PermissionsController@destroy');
                Route::get('/search', 'ACL\PermissionsController@search');
            });
        });
    });
});
