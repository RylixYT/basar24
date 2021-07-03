<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    /* API Endpoint for frontend */
    Route::get('users', [UserController::class, "index"]);

    /* API Endpoint for backend */
    Route::middleware(['admin'])->group(function () {
        Route::apiResources(
            [
                "/users" => UserController::class,
                "/customers" => CustomersController::class,
                "/cars" => VehiclesController::class,
            ]
        );
    });
});
