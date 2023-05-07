<?php

namespace App\Http\ApiV1\Modules\Repair\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RepairResource extends JsonResource
{
    public static $wrap = 'data';

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'car_id' => $this->car_id,
            'car_service_id' => $this->car_service_id,
            'issue' => $this->issue,
            'price' => $this->price
        ];
    }

    public function with(Request $request)
    {
        return [];
    }
}
