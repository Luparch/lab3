<?php

namespace App\Http\ApiV1\Modules\CarService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCarServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer'],
            'name' => ['string'],
            'address' => ['string'],
            'owner' => ['string']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('serviceId')]);
    }
}
