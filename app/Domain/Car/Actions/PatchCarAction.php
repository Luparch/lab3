<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class PatchCarAction
{
    public function execute(int $carId, array $fields)
    {
        $car = Car::findOrFail($carId);
        $car->update($fields);
        return $car;
    }
}
