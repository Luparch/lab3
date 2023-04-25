<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class DeleteCarAction
{
    public function execute(int $carId)
    {
        $car = Car::find($carId);
        if ($car != null){
            $car->delete();
        }
        return Car::find($carId);
    }
}
