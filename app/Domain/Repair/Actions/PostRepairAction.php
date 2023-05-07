<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class PostRepairAction
{
    public function execute($repair)
    {
        return Repair::create($repair);
    }
}
