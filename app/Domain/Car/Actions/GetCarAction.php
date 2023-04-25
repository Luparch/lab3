<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class GetCarAction
{
    public function execute(int $carId): Car
    {
        return Car::findOrFail($carId);
    }
}
