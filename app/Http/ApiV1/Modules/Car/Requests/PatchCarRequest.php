<?php

namespace App\Http\ApiV1\Modules\Car\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer'],
            'brand' => ['string'],
            'model' => ['string'],
            'number' => ['string'],
            'owner' => ['string']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('carId')]);
    }
}
