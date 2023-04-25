<?php

namespace App\Http\ApiV1\Modules\Car\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarCollection extends ResourceCollection
{
    public static $wrap = 'data';

    public function toArray(Request $request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
