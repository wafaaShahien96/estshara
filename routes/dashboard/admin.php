<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
  ], function(){

    Route::namespace('Dashboard')->prefix('admin')->name('admin.')->group(function(){

        Route::namespace('Auth')->group(function(){

            //Login Routes
            Route::get('/login','LoginController@showLoginForm')->name('login');
            Route::post('/login','LoginController@login');
            Route::post('/logout','LoginController@logout')->name('logout');

          });

          Route::middleware('auth:admin')->group(function(){

            Route::get('/', 'HomeController@index')->name('home');

            ##################Start Users Routes####################
            Route::resource('users', 'UsersController');
            ################## End Users Routes####################

            ##################Admins Routes####################
            Route::resource('admins', 'AdminController');
            ##################Admins Routes####################

             #################### Start Countries Routes #####################
            Route::resource('countries', 'CountriesController');
            #################### End Countries Routes #######################

            #################### Start Specialties Routes #####################
            Route::resource('specialties', 'SpecialtiesController')->except('show');
            #################### End Specialties Routes #######################

            #################### Start Doctors Routes #####################
            Route::resource('doctors', 'DoctorsController')->except(['show']);
            #################### End Doctors Routes #######################

          });


    });

  });
