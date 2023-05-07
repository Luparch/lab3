<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class DeleteCarServiceAction
{
    public function execute(int $serviceId)
    {
        $carService = CarService::find($serviceId);
        if ($carService != null){
            $carService->delete();
        }
        return CarService::find($serviceId);
    }
}
