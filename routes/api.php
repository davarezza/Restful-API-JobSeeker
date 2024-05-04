<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SocietyController;
use App\Http\Controllers\api\RegionalController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {
    Route::resource('society', SocietyController::class)->withoutMiddleware(['auth:sanctum']);
    Route::get('regional/list', [RegionalController::class, 'index']);
});
