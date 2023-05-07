<?php

use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\CarService\Controllers\CarServiceController;
use Illuminate\Routing\RouteGroup;

Route::group(['prefix' => '/api/v1'], function () {

    Route::controller(CarServiceController::class)->group(function () {

        Route::group(['prefix' => '/car-services'], function () {
    
            Route::get('', 'getCarServices');
    
            Route::post('', 'createCarService');

            Route::group(['prefix' => '/{serviceId}'], function () {
    
                Route::get('', 'getCarServiceById');
        
                Route::delete('', 'deleteCarServiceById');

                Route::put('', 'replaceCarServiceById');

                Route::patch('', 'patchCarServiceById');
        
            })->whereNumber('serviceId');
    
        });
    
    });

});
