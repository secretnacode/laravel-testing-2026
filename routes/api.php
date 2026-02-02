<?php

use App\Http\Controllers\API\V1\testController as V1TestController;
use App\Http\Controllers\API\V2\testController as V2TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return ["message" => "hellow"];
});

Route::prefix('v1')->group(function () {
    Route::apiResource('posting', V1TestController::class);
});
