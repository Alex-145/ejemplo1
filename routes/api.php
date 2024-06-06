<?php

use App\Http\Controllers\PersonitaController;
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


Route::middleware('api')->group(function () {
    Route::get('/personitas', [PersonitaController::class, 'index']);
    Route::post('/personitas', [PersonitaController::class, 'store']);
    Route::get('/personitas/{id}', [PersonitaController::class, 'show']);
    Route::put('/personitas/{id}', [PersonitaController::class, 'update']);
    Route::delete('/personitas/{id}', [PersonitaController::class, 'destroy']);
});

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
