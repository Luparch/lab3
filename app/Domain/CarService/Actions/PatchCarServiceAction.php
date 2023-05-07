<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class PatchCarServiceAction
{
    public function execute(int $serviceId, array $fields)
    {
        $carService = CarService::findOrFail($serviceId);
        $carService->update($fields);
        return $carService;
    }
}
