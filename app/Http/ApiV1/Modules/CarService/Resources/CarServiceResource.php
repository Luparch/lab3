<?php

namespace App\Http\ApiV1\Modules\CarService\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarServiceResource extends JsonResource
{
    public static $wrap = 'data';

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'owner' => $this->owner
        ];
    }

    public function with(Request $request)
    {
        return [];
    }
}
