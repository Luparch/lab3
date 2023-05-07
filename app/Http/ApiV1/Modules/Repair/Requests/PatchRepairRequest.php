<?php

namespace App\Http\ApiV1\Modules\Repair\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchRepairRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer'],
            'car_id' => ['integer'],
            'car_service_id' => ['integer'],
            'issue' => ['string'],
            'price' => ['integer']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('repairId')]);
    }
}
