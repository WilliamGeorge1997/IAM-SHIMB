<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('run-migrate', function () {
    Artisan::call('migrate');
    return Artisan::output();
});

Route::get('run-seed', function () {
    Artisan::call('db:seed');
    return Artisan::output();
});
