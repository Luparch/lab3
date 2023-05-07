<?php

namespace App\Http\ApiV1\Modules\Car\Controllers;

use App\Domain\Car\Actions\DeleteCarAction;
use App\Domain\Car\Actions\GetAllCarsAction;
use App\Domain\Car\Actions\GetCarAction;
use App\Domain\Car\Actions\PatchCarAction;
use App\Domain\Car\Actions\PostCarAction;
use App\Domain\Car\Actions\ReplaceCarAction;
use App\Http\ApiV1\Modules\Car\Requests\PostCarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\ApiV1\Modules\Car\Resources\CarResource;
use App\Domain\Car\Models\Car;
use App\Http\ApiV1\Modules\Car\Requests\GetCarRequest;
use App\Http\ApiV1\Modules\Car\Resources\CarCollection;
use App\Http\ApiV1\Modules\Car\Requests\DeleteCarRequest;
use App\Http\ApiV1\Modules\Car\Requests\PatchCarRequest;
use App\Http\ApiV1\Modules\Car\Requests\PutCarRequest;

class CarController extends Controller
{
    public function getCars(GetAllCarsAction $action)
    {
        return new CarCollection($action->execute());
    }

    public function createCar(PostCarRequest $request, PostCarAction $action)
    {
        return new CarResource($action->execute($request->validated()));
    }

    public function getCarById(GetCarRequest $request, GetCarAction $action)
    {
        return new CarResource($action->execute($request->carId));
    }

    public function deleteCarById(DeleteCarRequest $request, DeleteCarAction $action)
    {
        return ['data' => $action->execute($request->carId)];
    }

    public function replaceCarById(PutCarRequest $request, ReplaceCarAction $action)
    {
        return new CarResource($action->execute($request->carId, $request->validated()));
    }

    public function patchCarById(PatchCarRequest $request, PatchCarAction $action)
    {
        return new CarResource($action->execute($request->carId, $request->validated()));
    }
}
