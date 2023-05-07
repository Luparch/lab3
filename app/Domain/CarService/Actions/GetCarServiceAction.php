<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class GetCarServiceAction
{
    public function execute(int $serviceId): CarService
    {
        return CarService::findOrFail($serviceId);
    }
}
