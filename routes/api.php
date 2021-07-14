<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    /* API Endpoint for frontend */
    Route::prefix('data')->group(function () {
        Route::get('/rentables', [RentablesController::class, "index"]);
        Route::get('/werb', [AdsController::class, "index"]);
        Route::get('/discounts', [DiscountsController::class, "index"]);
    });

    /* API Endpoint for backend */
    Route::middleware(['admin'])->group(function () {
        Route::apiResources(
            [
                "/users" => UserController::class,
                "/customers" => CustomersController::class,
                "/cars" => VehiclesController::class,
                "/rentables" => RentablesController::class,
                "/deposits" => DepositsController::class,
                "/discounts" => DiscountsController::class,
                "/werb" => AdsController::class,
                "/rents" => RentsController::class
            ]
        );
    });
});
