<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class DeleteRepairAction
{
    public function execute(int $repairId)
    {
        $repair = Repair::find($repairId);
        if ($repair != null){
            $repair->delete();
        }
        return Repair::find($repairId);
    }
}
