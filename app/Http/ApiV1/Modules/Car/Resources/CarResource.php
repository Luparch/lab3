<?php

namespace App\Http\ApiV1\Modules\Car\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public static $wrap = 'data';

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'number' => $this->number,
            'owner' => $this->owner
        ];
    }

    public function with(Request $request)
    {
        return [];
    }
}
