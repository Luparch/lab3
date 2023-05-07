<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class GetAllRepairsAction
{
    public function execute()
    {
        return Repair::paginate(15);
    }
}
