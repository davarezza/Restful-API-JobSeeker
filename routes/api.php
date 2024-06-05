<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\SocietyController;
use App\Http\Controllers\api\RegionalController;
use App\Http\Controllers\api\JobCategoryController;
use App\Http\Controllers\api\ValidationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::resource('society', SocietyController::class);
        Route::get('regional/list', [RegionalController::class, 'index']);
        Route::resource('job-category', JobCategoryController::class);
        Route::post('validation', [SocietyController::class, 'validation']);
    });
});

Route::prefix('v1/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('validator/login', [ValidationController::class, 'loginValidator']);
    Route::post('logout', [AuthController::class, 'logout']);
});
