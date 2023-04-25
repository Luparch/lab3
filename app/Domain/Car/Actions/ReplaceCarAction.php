<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class ReplaceCarAction
{
    public function execute(int $carId, array $fields)
    {
        $car = Car::find($carId);
        if ($car == null){
            return Car::create($fields);
        }else{
            return $car->update($fields);
        }
    }
}
