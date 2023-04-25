<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Models\Car;

class GetAllCarsAction
{
    public function execute()
    {
        return Car::all();
    }
}
