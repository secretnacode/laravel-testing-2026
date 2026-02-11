<?php

use App\Http\Controllers\API\V1\testController as V1TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum", "throtle:api"])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix("v1")->group(function () {
        Route::apiResource("post", V1TestController::class);
    });
});

require __DIR__ . '/auth.php';
