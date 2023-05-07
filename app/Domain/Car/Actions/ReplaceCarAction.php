<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class ReplaceCarAction
{
    public function execute(int $carId, array $fields): Car
    {
        $car = Car::find($carId);
        if ($car == null){
            $fields['id'] = $carId;
            return Car::create($fields);
        }else{
            $car->update($fields);
            return $car = Car::find($carId);
        }
    }
}
