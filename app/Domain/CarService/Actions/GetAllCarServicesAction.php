<?php

namespace App\Domain\CarService\Actions;

use App\Domain\CarService\Models\CarService;

class GetAllCarServicesAction
{
    public function execute()
    {
        return CarService::paginate(15);
    }
}
