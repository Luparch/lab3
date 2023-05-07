<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class PatchRepairAction
{
    public function execute(int $repairId, array $fields)
    {
        $repair = Repair::findOrFail($repairId);
        $repair->update($fields);
        return $repair;
    }
}
