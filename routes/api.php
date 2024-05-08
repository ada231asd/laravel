<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\TagController;
use App\Models\Sparepart;
use Database\Seeders\ImageSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::apiResource('spareparts', SparepartController::class);
    Route::apiResource('images', ImageController::class);
    Route::apiResource('tags', TagController::class);
});