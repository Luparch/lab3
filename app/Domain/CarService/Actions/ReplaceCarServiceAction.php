<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class ReplaceCarServiceAction
{
    public function execute(int $serviceId, array $fields): CarService
    {
        $carService = CarService::find($serviceId);
        if ($carService == null){
            $fields['id'] = $serviceId;
            return CarService::create($fields);
        }else{
            $carService->update($fields);
            return $carService = CarService::find($serviceId);
        }
    }
}
