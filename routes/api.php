<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MountainGroupController;
use App\Http\Controllers\TerrainPointController;
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

Route::group(['prefix' => 'terrain-points'], function () {
    Route::get('/', [TerrainPointController::class, 'index']);
    Route::post('/', [TerrainPointController::class, 'store']);
    Route::get('/{terrainPoint}', [TerrainPointController::class, 'show']);
    Route::put('/{terrainPoint}', [TerrainPointController::class, 'update']);
    Route::delete('/{terrainPoint}', [TerrainPointController::class, 'destroy']);
});

Route::group(['prefix' => 'mountain-groups'], function () {
    Route::get('/', [MountainGroupController::class, 'index']);
    Route::post('/', [MountainGroupController::class, 'store']);
    Route::get('/{mountainGroup}', [MountainGroupController::class, 'show']);
    Route::put('/{mountainGroup}', [MountainGroupController::class, 'update']);
    Route::delete('/{mountainGroup}', [MountainGroupController::class, 'destroy']);
});