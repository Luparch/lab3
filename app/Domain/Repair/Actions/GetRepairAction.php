<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class GetRepairAction
{
    public function execute(int $repairId): Repair
    {
        return Repair::findOrFail($repairId);
    }
}
