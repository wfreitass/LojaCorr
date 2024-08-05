<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\SubCategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("auth")->group(function () {
    Route::post('register', [AuthController::class, 'createUser']);
    Route::post('login', [AuthController::class, 'loginUser']);
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

Route::apiResource("categoria", CategoriaController::class)->middleware('auth:sanctum');
Route::apiResource("subcategoria", SubCategoriaController::class);
