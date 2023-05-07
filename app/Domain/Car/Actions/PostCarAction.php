<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class PostCarAction
{
    public function execute($car): Car
    {
        return Car::create($car);
    }
}
