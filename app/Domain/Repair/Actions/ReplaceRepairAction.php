<?php

namespace App\Domain\Repair\Actions;

use App\Domain\Repair\Models\Repair;

class ReplaceRepairAction
{
    public function execute(int $repairId, array $fields): Repair
    {
        $repair = Repair::find($repairId);
        if ($repair == null){
            $fields['id'] = $repairId;
            return Repair::create($fields);
        }else{
            $repair->update($fields);
            return Repair::find($repairId);
        }
    }
}
