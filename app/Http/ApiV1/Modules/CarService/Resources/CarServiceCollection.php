<?php

namespace App\Http\ApiV1\Modules\CarService\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarServiceCollection extends ResourceCollection
{

    public function toArray(Request $request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
