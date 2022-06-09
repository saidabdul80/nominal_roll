<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/dismiss', [App\Http\Controllers\RankController::class, 'dismiss'])->name('dismiss');
Route::post('/transferout', [App\Http\Controllers\RankController::class, 'transfer'])->name('transferout');
Route::post('/death', [App\Http\Controllers\RankController::class, 'death'])->name('death');
Route::post('/undodeath', [App\Http\Controllers\RankController::class, 'undoDeath'])->name('undodeath');
Route::post('/undodismissal',[App\Http\Controllers\RankController::class, 'undoDismissal'])->name('undodismissal');
Route::post('/undotransfer', [App\Http\Controllers\RankController::class, 'undoTransfer'])->name('undotransfer');
