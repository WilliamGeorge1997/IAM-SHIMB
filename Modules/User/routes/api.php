<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\Api\UserController;
use Modules\User\App\Http\Controllers\Api\UserAuthController;
use Modules\User\App\Http\Controllers\Api\StudentAdminController;
use Modules\User\App\Http\Controllers\Api\TrainerAdminController;

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

Route::group([
    'prefix' => 'user'
], function ($router) {
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', [UserAuthController::class, 'login']);
        Route::post('logout', [UserAuthController::class, 'logout']);
        Route::post('refresh', [UserAuthController::class, 'refresh']);
        Route::post('me', [UserAuthController::class, 'me']);
    });
    Route::post('change-password', [UserController::class, 'changePassword']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
});

Route::group(['prefix' => 'admin'], function ($router) {
    Route::get('trainers', [TrainerAdminController::class, 'index']);
    Route::post('trainers', [TrainerAdminController::class, 'store']);
    
    Route::get('students', [StudentAdminController::class, 'index']);
    Route::post('students', [StudentAdminController::class, 'store']);
});
