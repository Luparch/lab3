<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class PostCarServiceAction
{
    public function execute($carService): CarService
    {
        return CarService::create($carService);
    }
}
