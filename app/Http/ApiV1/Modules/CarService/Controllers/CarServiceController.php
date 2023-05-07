<?php

namespace App\Http\ApiV1\Modules\CarService\Controllers;

use App\Domain\CarService\Actions\GetAllCarServicesAction;
use App\Http\ApiV1\Modules\CarService\Resources\CarServiceCollection;
use App\Http\ApiV1\Modules\CarService\Requests\PostCarServiceRequest;
use App\Domain\CarService\Actions\PostCarServiceAction;
use App\Http\ApiV1\Modules\CarService\Resources\CarServiceResource;
use App\Http\ApiV1\Modules\CarService\Requests\GetCarServiceRequest;
use App\Domain\CarService\Actions\GetCarServiceAction;
use App\Http\ApiV1\Modules\CarService\Requests\DeleteCarServiceRequest;
use App\Domain\CarService\Actions\DeleteCarServiceAction;
use App\Http\ApiV1\Modules\CarService\Requests\PutCarServiceRequest;
use App\Domain\CarService\Actions\ReplaceCarServiceAction;
use App\Http\ApiV1\Modules\CarService\Requests\PatchCarServiceRequest;
use App\Domain\CarService\Actions\PatchCarServiceAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarServiceController extends Controller
{
    public function getCarServices(GetAllCarServicesAction $action)
    {
        return new CarServiceCollection($action->execute());
    }

    public function createCarService(PostCarServiceRequest $request, PostCarServiceAction $action)
    {
        return new CarServiceResource($action->execute($request->validated()));
    }

    public function getCarServiceById(GetCarServiceRequest $request, GetCarServiceAction $action)
    {
        return new CarServiceResource($action->execute($request->serviceId));
    }

    public function deleteCarServiceById(DeleteCarServiceRequest $request, DeleteCarServiceAction $action)
    {
        return ['data' => $action->execute($request->serviceId)];
    }

    public function replaceCarServiceById(PutCarServiceRequest $request, ReplaceCarServiceAction $action)
    {
        return new CarServiceResource($action->execute($request->serviceId, $request->validated()));
    }

    public function patchCarServiceById(PatchCarServiceRequest $request, PatchCarServiceAction $action)
    {
        return new CarServiceResource($action->execute($request->serviceId, $request->validated()));
    }
}
