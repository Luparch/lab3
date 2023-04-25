<?php

use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Car\Controllers\CarController;
use Illuminate\Routing\RouteGroup;

Route::group(['prefix' => '/api/v1'], function () {

    Route::controller(CarController::class)->group(function () {

        Route::group(['prefix' => '/cars'], function () {
    
            Route::get('', 'getCars');
    
            Route::post('', 'createCar');

            Route::group(['prefix' => '/{carId}'], function () {
    
                Route::get('', 'getCarById');
        
                Route::delete('', 'deleteCarById');

                Route::put('', 'replaceCarById');

                Route::patch('', 'patchCarById');
        
            })->whereNumber('carId');
    
        });
    
    });

});
