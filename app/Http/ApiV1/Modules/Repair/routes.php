<?php

use Illuminate\Support\Facades\Route;
use App\Http\ApiV1\Modules\Repair\Controllers\RepairController;
use Illuminate\Routing\RouteGroup;

Route::group(['prefix' => '/api/v1'], function () {

    Route::controller(RepairController::class)->group(function () {

        Route::group(['prefix' => '/repairs'], function () {
    
            Route::get('', 'getRepairs');
    
            Route::post('', 'createRepair');

            Route::group(['prefix' => '/{repairId}'], function () {
    
                Route::get('', 'getRepairById');
        
                Route::delete('', 'deleteRepairById');

                Route::put('', 'replaceRepairById');

                Route::patch('', 'patchRepairById');
        
            })->whereNumber('repairId');
    
        });
    
    });

});
