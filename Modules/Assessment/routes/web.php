<?php

use Illuminate\Support\Facades\Route;
use Modules\Assessment\App\Http\Controllers\ItemController;
use Modules\Assessment\App\Http\Controllers\AssessmentGroupController;
use Modules\Assessment\App\Http\Controllers\ReportController;

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

Route::get('mega-buildings/{mega_building}/types/{building_type}/assessment-groups', [AssessmentGroupController::class, 'index'])->name('assessment-groups.index');
Route::get('mega-buildings/{mega_building}/types/{building_type}/assessment-groups/{assessment_group}/items', [ItemController::class, 'index'])->name('items.index');
Route::post('mega-buildings/{mega_building}/types/{building_type}/assessment-groups/{assessment_group}/items/earned-points', [ItemController::class, 'storeEarnedPoints'])->name('items.store-earned-points');
Route::get('mega-buildings/{mega_building}/report', [ReportController::class, 'show'])->name('mega-building.report');
