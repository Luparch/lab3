<?php

namespace App\Http\ApiV1\Modules\Repair\Controllers;

use App\Domain\Repair\Actions\GetAllRepairsAction;
use App\Http\ApiV1\Modules\Repair\Resources\RepairCollection;
use App\Http\ApiV1\Modules\Repair\Resources\RepairResource;
use App\Http\ApiV1\Modules\Repair\Requests\PostRepairRequest;
use App\Domain\Repair\Actions\PostRepairAction;
use App\Http\ApiV1\Modules\Repair\Requests\GetRepairRequest;
use App\Domain\Repair\Actions\GetRepairAction;
use App\Domain\Repair\Actions\DeleteRepairAction;
use App\Http\ApiV1\Modules\Repair\Requests\DeleteRepairRequest;
use App\Http\ApiV1\Modules\Repair\Requests\PutRepairRequest;
use App\Domain\Repair\Actions\ReplaceRepairAction;
use App\Domain\Repair\Actions\PatchRepairAction;
use App\Http\ApiV1\Modules\Repair\Requests\PatchRepairRequest;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function getRepairs(GetAllRepairsAction $action)
    {
        return new RepairCollection($action->execute());
    }

    public function createRepair(PostRepairRequest $request, PostRepairAction $action)
    {
        try{
            return new RepairResource($action->execute($request->validated()));
        }catch(QueryException){
            return response()->json([
                'data' => null,
                'errors' => [
                    'code' => 1,
                    'message' => 'машины или автосервиса не существует'
                ]
            ], 400);
        }
    }

    public function getRepairById(GetRepairRequest $request, GetRepairAction $action)
    {
        return new RepairResource($action->execute($request->repairId));
    }

    public function deleteRepairById(DeleteRepairRequest $request, DeleteRepairAction $action)
    {
        return ['data' => $action->execute($request->repairId)];
    }

    public function replaceRepairById(PutRepairRequest $request, ReplaceRepairAction $action)
    {
        try{
            return new RepairResource($action->execute($request->repairId, $request->validated()));
        }catch(QueryException){
            return response()->json([
                'data' => null,
                'errors' => [
                    'code' => 1,
                    'message' => 'машины или автосервиса не существует'
                ]
            ], 400);
        }
    }

    public function patchRepairById(PatchRepairRequest $request, PatchRepairAction $action)
    {
        try{
            return new RepairResource($action->execute($request->repairId, $request->validated()));
        }catch(QueryException){
            return response()->json([
                'data' => null,
                'errors' => [
                    'code' => 1,
                    'message' => 'машины или автосервиса не существует'
                ]
            ], 400);
        }
    }
}
