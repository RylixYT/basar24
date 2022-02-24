<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {
    /* API endpoint for frontend */
    Route::prefix('data')->group(function () {
        Route::get('/infos', [RentablesController::class, "index"]);
        Route::get('/rentables', [RentablesController::class, "index"]);
        Route::get('/discounts', [DiscountsController::class, "index"]);
    });

    /* API endpoint for backend */
    Route::middleware(['admin'])->group(function () {
        Route::apiResources(
            [
                "/users" => UserController::class,
                "/customers" => CustomersController::class,
                "/cars" => VehiclesController::class,
                "/rentables" => RentablesController::class,
                "/deposits" => DepositsController::class,
                "/discounts" => DiscountsController::class,
                "/rents" => RentsController::class,
                "/vertrag" => VertragsController::class,
                "/infos" => InfosController::class
            ]
        );
    });
});
