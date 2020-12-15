<?php

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'API\Auth'

], function ($router) {

    // User APIs
    Route::group(['prefix' => 'user'], function () {
        Route::post('register', 'AuthUserController@register');
        Route::post('verify', 'AuthUserController@checkVerificationCode');
        Route::post('resendVcode', 'AuthUserController@resendVcode');
        Route::post('login', 'AuthUserController@login');
        Route::post('logout', 'AuthUserController@logout');
        Route::post('refresh', 'AuthUserController@refresh');
        Route::post('user_profile', 'AuthUserController@user_profile');

        // Rest Password
        Route::group(['prefix' => 'password'], function () {
            Route::post('sendResetPasswordVCode', 'AuthUserController@sendResetPasswordVCode');
            Route::post('resendPasswordVCode', 'AuthUserController@resendPasswordVCode');
            Route::post('create_token', 'AuthUserController@create_token');
            Route::post('resetPassword', 'AuthUserController@resetPassword');
        });
    });

    // Doctor APIs
    Route::group(['prefix' => 'doctor'], function () {
        Route::post('register', 'AuthDoctorController@register');
        Route::post('verify', 'AuthDoctorController@checkVerificationCode');
        Route::post('resendVcode', 'AuthDoctorController@resendVcode');
        Route::post('login', 'AuthDoctorController@login');
        Route::post('logout', 'AuthDoctorController@logout');
        Route::post('refresh', 'AuthDoctorController@refresh');
        Route::post('compeleteProfile', 'AuthDoctorController@compeleteProfile');
        Route::post('doctorprofile', 'AuthDoctorController@doctorprofile');

        // Rest Password
        Route::group(['prefix' => 'password'], function () {
            Route::post('sendResetPasswordVCode', 'AuthDoctorController@sendResetPasswordVCode');
            Route::post('resendPasswordVCode', 'AuthDoctorController@resendPasswordVCode');
            Route::post('create_token', 'AuthDoctorController@create_token');
            Route::post('resetPassword', 'AuthDoctorController@resetPassword');
        });
    });
});

// Specialties APIs
Route::group(['prefix' => 'specialties', 'namespace' => 'API', 'middleware' => 'api'], function () {
    Route::get('all', 'SpecialtiesController@all');
    Route::get('getDoctors', 'SpecialtiesController@getDoctors');
});
